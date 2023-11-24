<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\FirebaseService;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class EditProductModal extends ModalComponent
{
    use WithFileUploads;
    public $product;
    public $name;
    public $category;
    public $description;
    public $selectedCategory;
    public $product_images = [];
    public $images = [];
    public $test;
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->category = $product->ProductCategory->name;
        $this->selectedCategory = $product->ProductCategory->id;
        $this->description = $product->description;
        $this->images = array_fill(0, 5, null);
        // $this->product_images = array_fill(0, 5, null);
        foreach ($product->ProductImages as $index => $image) {
            if ($index < 5) {
                $this->product_images[$index] = $image->image;
            }
        }
    }
    public function save()
    {
        $i = count($this->product->ProductImages);
        foreach ($this->images as $index => $image) {
            if ($index < $i) {
                if($image!=null){
                    if ($image != $this->product_images[$index]) {
                        FirebaseService::deleteFile('images', $this->product->ProductImages[$index]->image);
                        $res = FirebaseService::uploadFile("images", $image);
                        $this->product->ProductImages[$index]->image = $res;
                        $img = $this->product->ProductImages[$index];
                        $img->save();
                    }
                }
                else{
                    if($this->product_images[$index]==null){
                        FirebaseService::deleteFile('images', $this->product->ProductImages[$index]->image);
                    }
                }
            } else {
                if ($image != null) {
                    $res = FirebaseService::uploadFile("images", $image);
                    $newImage = new ProductImage();
                    $newImage->id = Str::uuid(36);
                    $this->product->productImages()->save($newImage);
                $newImage->image = $res;
                }
            }
        }
        $this->product->product_category_id = $this->selectedCategory;
        $this->product->description = $this->description;

        $this->product->save();
        Controller::SuccessMessage("Update product success");
        $this->closeModal();
    }

    public function remove($index){
        $i = count($this->product->ProductImages);
        if($index < $i){
            $this->product_images[$index] = null;
        }
        else{
            $this->images[$index] = null;
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
