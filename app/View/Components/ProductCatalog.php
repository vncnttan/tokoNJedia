<?php

namespace App\View\Components;

use App\Models\FlashSaleProduct;
use App\Models\Product;
use App\Models\ProductPromo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ProductCatalog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $following;
    public $productPromo;
    public $flashSalePromo;
    public $discount;

    public function __construct($productId, $productPromoId = null, $flashSalePromoId = null)
    {
        $this->product = Product::with(['productVariants', 'reviews', 'merchant'])
            ->where('id', $productId)
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->first();

        $this->productPromo = ProductPromo::find($productPromoId);
        $this->flashSalePromo = FlashSaleProduct::find($flashSalePromoId);

        if ($this->productPromo && $this->flashSalePromo) {
            if ($this->productPromo->discount > $this->flashSalePromo->discount) {
                $this->discount = $this->productPromo->discount;
            } else if ($this->flashSalePromo->discount > $this->productPromo->discount) {
                $this->discount = $this->flashSalePromo->discount;
            }
        } else if ($this->productPromo) {
            $this->discount = $this->productPromo->discount;
        } else if ($this->flashSalePromo) {
            $this->discount = $this->flashSalePromo->discount;
        }

        $this->following = false;


        if(!auth()->user()) {
            return redirect()->route('login');
        }
        $followings = auth()->user()->following;

        foreach ($followings as $following) {
            if ($following->merchant_id == $this->product->merchant_id) {
                $this->following = true;
                break;
            }
        }
        $this->product->average_review = round($this->product->reviews->avg('review') ?? 0, 2);
        $this->product->review_count = $this->product->reviews->count() ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.product.product-catalog', ["product" => $this->product, 'isLoggedIn' => auth()->check(), 'following' => $this->following]);
    }
}
