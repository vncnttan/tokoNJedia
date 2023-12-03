<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Livewire\Component;

class MerchantProductCard extends Component
{
    public $product;
    protected $listeners = ["productUpdated" => "refresh"];
    public function mount(Product $product){
        $this->product = $product;
    }

    public function refresh(Product $product){
        if($this->product == $product){
            $this->product = $product;
        }
    }
    public function destroy(Product $product){
        if($this->product->id == $product->id){
            $this->product->delete();
            $this->emitUp('destroyed', $product->id);
            Controller::SuccessMessage("Delete Product Success");
        }
    }
    public function render()
    {
        return view('components.merchant.merchant-product-card');
    }
}
