<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use Livewire\Component;

class MerchantProductCard extends Component
{
    public $product;
    protected $listeners = ["productUpdated" => "refresh"];
    public function mount($product){
        $this->product = $product;
    }

    public function refresh($product){
        if($this->product == $product){
            $this->product = $product;
        }
    }
    public function destroy(){
        $this->emit('destroyed', $this->product);
        $this->product->delete();
        Controller::SuccessMessage("Delete Product Success");
    }
    public function render()
    {
        return view('components.merchant.merchant-product-card');
    }
}
