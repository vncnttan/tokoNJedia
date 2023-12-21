<?php

namespace App\View\Components;

use App\Models\Product;
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

    public function __construct($productId)
    {
        $this->product = Product::with(['productVariants', 'reviews', 'merchant'])
            ->where('id', $productId)
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->first();
        $this->following = auth()->check() ? auth()->user()->following->contains($this->product->merchant_id) : false;
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
