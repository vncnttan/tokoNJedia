<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(): Factory|View|Application
    {
        $recommendedProducts = Product::
//        with(['merchant' => function ($query) {
//            $query->select('id', 'city');
//        }])->
        withCount(['transactionDetails as sold' => function ($query) {
            $query->select(DB::raw("SUM(quantity)"));
        }])->
        with(['ratings'])
            ->get()
            ->map(function ($product) {
                $product->average_rating = $product->ratings->avg('rating');
                unset($product->ratings); // Remove the ratings collection if you don't need it after calculating the average
                return $product;
            })->random(7);
        return view('pages.home.home', ['recommendedProducts' => $recommendedProducts]);
    }
}
