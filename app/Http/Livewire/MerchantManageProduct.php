<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantManageProduct extends Component
{
    public $products;
    protected $listeners = ['destroyed' => 'destroy'];
    public $search = '';
    public function mount()
    {
        $merchant = Auth::user()->Merchant;
        $products = $merchant->Products()->with(['ProductCategory', 'ProductVariants', 'ProductImages'])->get();
        $this->products = $products;
    }

    public function destroy($id)
    {
        $this->products = $this->products->reject(function ($product) use ($id) {
            return $product->id === $id;
        });
    }
    public function render()
    {
        $products = Product::search($this->search);
        $this->products = $products;
        return view('livewire.merchant.merchant-manage-product');
    }
}
