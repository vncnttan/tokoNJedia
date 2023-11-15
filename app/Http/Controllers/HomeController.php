<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('pages.home.home');
    }

    public function detail(string $productId): Factory|View|Application
    {
        return view('pages.home.product-detail', ['product_id' => $productId]);
    }


}
