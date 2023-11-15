<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class RecommendedProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $recommendedProducts = Product::with(['merchant.location', 'ratings'])
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->get()
            ->map(function ($product) {
                $product->merchant_city = $product->merchant->location[0]->city ?? 'N/A';
                $product->average_rating = $product->ratings->avg('rating') ?? 0;
                return $product;
            })->random(6);
        return view('components.recommended-product', ['recommendedProducts' =>  $recommendedProducts]);
    }
}