<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\StorageService;
use Illuminate\Support\Facades\Validator;
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
    protected $listeners = ['categoryUpdated' => 'updateCategory'];

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

    public function save(): bool|\Illuminate\Http\RedirectResponse
    {
        $messages = [
            'name.required' => 'Product name is required',
            'name.min' => 'Product name must be at least 3 characters',
            'name.max' => 'Product name must be at most 50 characters',
            'description.required' => 'Product description is required',
            'description.min' => 'Product description must be at least 5 characters',
            'description.max' => 'Product description must be at most 200 characters',
            'category.required' => 'Product category is required',
        ];
        $validate = Validator::make(
            ['name' => $this->name, 'description' => $this->description, 'category' => $this->selectedCategory],
            [
                'name' => 'required|min:3|max: 50',
                'description' => 'required|min:5|max:200',
                'category' => 'required'
            ],
            $messages
        );
        if ($validate->fails()) {
            Controller::FailMessage($validate->errors()->first());
            return false;
        }
        $imageCount = count(array_filter($this->images)) + count(array_filter($this->product_images));
        if ($imageCount < 1) {
            Controller::FailMessage('Image must be at least 1');
            return false;
        }

        $i = count($this->product->ProductImages);
        foreach ($this->images as $index => $image) {
            if ($index < $i) {
                if ($image != null) {
                    if ($image != $this->product_images[$index]) {
                        StorageService::deleteFile('images', $this->product->ProductImages[$index]->image);
                        $res = StorageService::uploadFile("images", $image);
                        $this->product->ProductImages[$index]->image = $res;
                        $img = $this->product->ProductImages[$index];
                        $img->save();
                    }
                } else {
                    if ($this->product_images[$index] == null) {
                        StorageService::deleteFile('images', $this->product->ProductImages[$index]->image);
                        $this->product->ProductImages[$index]->delete();
                    }
                }
            } else {
                if ($image != null) {
                    $res = StorageService::uploadFile("images", $image);
                    $newImage = new ProductImage();
                    $newImage->id = Str::uuid(36);
                    $newImage->image = $res;
                    $this->product->productImages()->save($newImage);
                }
            }
        }
        $this->product->name = $this->name;
        $this->product->product_category_id = $this->selectedCategory;
        $this->product->description = $this->description;

        $this->closeModal();
        $this->product->save();
        $this->emit("productUpdated", $this->product);
        Controller::SuccessMessage("Update product success");
        return redirect()->back();
    }

    public function remove($index)
    {
        $i = count($this->product->ProductImages);
        if ($index < $i) {
            $this->product_images[$index] = null;
        } else {
            $this->images[$index] = null;
        }
    }

    public function updateCategory($category_id)
    {
        $this->selectedCategory = $category_id;
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
