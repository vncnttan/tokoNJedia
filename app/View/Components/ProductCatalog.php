<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ProductCatalog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;

    public function __construct($productId)
    {
        $this->product = Product::with(['productVariants', 'ratings', 'merchant'])
            ->where('id', $productId)
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->first();
        $this->product->average_rating = round($this->product->ratings->avg('rating') ?? 0, 2);
        $this->product->rating_count = $this->product->ratings->count() ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.product.product-catalog', ["product" => $this->product, 'isLoggedIn' => auth()->check()]);
    }
}
