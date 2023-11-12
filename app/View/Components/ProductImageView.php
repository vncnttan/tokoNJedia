<?php

namespace App\View\Components;

use App\Models\ProductImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductImageView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $productImages;
    public function __construct($productId)
    {
        $this->productImages = ProductImage::where('product_id', $productId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.product-image-view', ['productImages' => $this->productImages]);
    }
}
