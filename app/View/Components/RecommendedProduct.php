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

    private int $requestCount;
    private int $isInfiniteScrolling;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isInfiniteScrolling = 1, $requestCount = 6)
    {
        $this->requestCount = $requestCount;
        $this->isInfiniteScrolling = $isInfiniteScrolling;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        $recommendedProducts = $this->getRecommendedProducts($this->requestCount);
        return view('components.recommended-product', ['recommendedProducts' =>  $recommendedProducts, 'requestCount' => $this->requestCount, 'isInfiniteScrolling' => $this->isInfiniteScrolling]);
    }

    public function getRecommendedProducts($requestCount)
    {
        return Product::with(['merchant.location', 'reviews'])
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->get()
            ->map(function ($product) {
                $product->merchant_city = $product->merchant->location[0]->city ?? 'N/A';
                $product->average_review = round($product->reviews->avg('review') ?? 0, 2);
                return $product;
            })->random($requestCount);
    }
}
