<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $productCategories = ProductCategory::with('products', 'products.productImages')->get()->random(4);
        return view('pages.home.home', ['productCategories' => $productCategories]);
    }

    public function detail(string $productId): Factory|View|Application
    {
        return view('pages.home.product-detail', ['product_id' => $productId]);
    }


}
