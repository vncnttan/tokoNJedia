<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Component;

class ProductVariantDropdown extends Component
{
    public $product;
    public $variants;

    protected $listeners = ["updatedVariant" => "refresh"];

    public function mount($product)
    {
        $this->product = $product;
    }
    public function refresh(Product $product){
        if($this->product->id == $product->id){
            $this->variants = $this->product->ProductVariants;
        }
    }

    public function destroy($id){
        $p = ProductVariant::find($id);
        $variants = $this->product->ProductVariants;
        if(count($variants) < 3){
            toastr()->error("Product must have at least 2 variants", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return;
        }
        if($p!=null){
            $p->delete();
            toastr()->success("Delete product variant success", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }else{
            toastr()->error("Delete product variant failed", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }
        $this->render();
    }


    public function render()
    {
        $this->variants = $this->product->ProductVariants;
        return view('livewire.product-variant-dropdown', ['variants' => $this->variants]);
    }
}
