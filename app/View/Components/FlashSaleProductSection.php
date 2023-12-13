<?php

namespace App\View\Components;

use App\Models\FlashSaleProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class FlashSaleProductSection extends Component
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
     * @return View
     */
    public function render()
    {
        $productIds = FlashSaleProduct::pluck('product_id')->toArray();
        $flashSaleProduct = Product::with(['merchant.location', 'reviews', 'flashSaleProducts'])
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->whereIn('id', $productIds)
            ->get()
            ->map(function ($product) {
                $product->merchant_city = $product->merchant->location[0]->city ?? 'N/A';
                $product->average_review = round($product->reviews->avg('review') ?? 0, 2);
                return $product;
            });
        return view('components.flash-sale-product-section', ['flashSaleProduct' =>  $flashSaleProduct]);
    }
}
