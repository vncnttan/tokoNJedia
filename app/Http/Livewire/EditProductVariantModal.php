<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditProductVariantModal extends ModalComponent
{

    public $product;
    public $variant;
    public $name;
    public $stock;
    public $price;
    public function mount(Product $product, ProductVariant $variant){
        $this->product = $product;
        $this->variant = $variant;
        $this->name = $variant->name;
        $this->stock = $variant->stock;
        $this->price = $variant->price;
    }
    public function save(){
        $validate = Validator::make(['name' => $this->name, 'stock' => $this->stock, 'price' => $this->price], [
            'name' => 'required|min:3|max:50',
            'stock' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1'
        ]);
        if($validate->fails()){
            Controller::FailMessage($validate->errors()->first());
            $this->closeModal();
            return;
        }
        $this->variant->name = $this->name;
        $this->variant->stock = $this->stock;
        $this->variant->price = $this->price;
        $this->variant->save();
        $this->emit('updatedVariant', $this->product);
        Controller::SuccessMessage("Update Product Variant Success");
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.edit-product-variant-modal');
    }
}
