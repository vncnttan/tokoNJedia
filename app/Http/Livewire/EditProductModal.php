<?php

namespace App\Http\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class EditProductModal extends ModalComponent
{
    public $product;
    public $name;
    public $category;
    public $description;
    public $product_images = [];
    public $images = [];
    public $test;
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->category = $product->ProductCategory->name;
        $this->description = $product->description;
        // $this->images = array_fill(0, 5, null);
        $this->product_images = $product->ProductImages;
        foreach ($product->ProductImages as $index => $image) {
            if ($index < 5) {
                $this->images[$index] = $image->image;
            }
        }
    }
    public function render()
    {
        return view('livewire.edit-product-modal');
    }
    public static function modalMaxWidth(): string
    {
        return '4xl';

    }
}
