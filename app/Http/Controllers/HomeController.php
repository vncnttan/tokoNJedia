<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $recommendedProducts = Product::with(['merchant.location', 'ratings'])
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->get()
            ->map(function ($product) {
                $product->merchant_city = $product->merchant->location->city ?? 'N/A';
                $product->average_rating = $product->ratings->avg('rating') ?? 0;
                return $product;
            })->random(6);
        return view('pages.home.home', ['recommendedProducts' => $recommendedProducts]);
    }

    public function detail(string $productId): Factory|View|Application
    {
        $recommendedProducts = Product::with(['merchant.location', 'ratings'])
            ->withCount(['transactionDetails as sold' => function ($query) {
                $query->select(DB::raw("SUM(quantity)"));
            }])
            ->get()
            ->map(function ($product) {
                $product->merchant_city = $product->merchant->location->city ?? 'N/A';
                $product->average_rating = $product->ratings->avg('rating') ?? 0;
                return $product;
            })->random(6);
        return view('pages.home.product-detail', ['product_id' => $productId, 'recommendedProducts' =>  $recommendedProducts]);
    }
}
