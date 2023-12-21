<?php

namespace App\View\Components;

use App\Models\FlashSaleProduct;
use App\Models\Product;
use App\Models\ProductPromo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product;
    public $productPromo;
    public $flashSalePromo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($productId, $productPromoId = null, $flashSalePromoId = null)
    {
        $this->product = Product::with(['productImages', 'productVariants', 'Merchant', 'Merchant.Location'])
            ->where('id', $productId)
            ->first();

        $this->productPromo = ProductPromo::find($productPromoId);
        $this->flashSalePromo = FlashSaleProduct::find($flashSalePromoId);

        if ($this->flashSalePromo != null) {
            date_default_timezone_set('Asia/Jakarta');
            $currentHour = date('G');

            if ($currentHour < 22 || $currentHour > 24) {
                $this->flashSalePromo = null;
            }
        }

        $this->product->image = $this->product->productImages->first()->image ?? 'https://via.placeholder.com/150';
        $this->product->price = $this->product->productVariants->first()->price ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.product.product-card');
    }
}
