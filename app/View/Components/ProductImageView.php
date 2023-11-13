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

        if(count($this->productImages ) == 0){
            $this->productImages = [new ProductImage([
                'image' => 'https://via.placeholder.com/600',
                'product_id' => $productId
            ])];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.product.product-image-view', ['productImages' => $this->productImages]);
    }
}
