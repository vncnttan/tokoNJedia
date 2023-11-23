<?php

namespace App\Http\Livewire;

use App\Models\ProductVariant;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddProductVariantModal extends ModalComponent
{
    public $product;
    public $name;
    public $price;
    public $stock;
    public function mount($product)
    {
        $this->product = $product;
    }

    public function store(){
        $validate = Validator::make(['name' => $this->name,
                                    'price' => $this->price,
                                    'stock' => $this->stock], [
                                        'name' => 'required|min:3|max:50',
                                        'price' => 'required|numeric|min:1',
                                        'stock' => 'required|numeric|min:1'
                                    ]);
        if($validate->fails()){
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return;
        }
        $variant = new ProductVariant();
        $variant->id = Str::uuid();
        $variant->name = $this->name;
        $variant->price = $this->price;
        $variant->stock = $this->stock;
        $variant->product_id = $this->product["id"];
        $variant->save();
        toastr()->success("Add new product variant success", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        $this->closeModal();
        $this->emit("updatedVariant", $this->product);
    }
    public function render()
    {
        return view('livewire.add-product-variant-modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
