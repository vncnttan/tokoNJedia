<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantManageProduct extends Component
{
    public $products;
    protected $listeners = ['destroyed' => 'destroy'];
    public function mount(){
        $merchant = Auth::user()->Merchant;
        $products = $merchant->Products()->with(['ProductCategory', 'ProductVariants', 'ProductImages'])->get();
        $this->products = $products;
    }

    public function destroy($product){
        $this->products = $this->products->reject(function ($p) use ($product) {
            return $p->id == $product->id;
        });
    }
    public function render()
    {
        return view('livewire.merchant.merchant-manage-product');
    }
}
