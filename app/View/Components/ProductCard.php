<?php

namespace App\View\Components;

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

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($productId, $productPromoId = null)
    {
        $this->product = Product::with(['productImages', 'productVariants', 'Merchant', 'Merchant.Location'])
            ->where('id', $productId)
            ->first();
        $this->productPromo = ProductPromo::find($productPromoId);

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
