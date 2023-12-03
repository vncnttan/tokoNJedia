<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;

class ProductCategoryDropdown extends Component
{
    public $search = '';
    public $category;
    public function mount($currCategory="Product Category"){
        $this->category = $currCategory;
    }

    public function render()
    {
        $categories = ProductCategory::search($this->search)->get();
        return view('livewire.product-category-dropdown', ['categories' => $categories]);
    }
}
