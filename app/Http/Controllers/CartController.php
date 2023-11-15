<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(): Factory|View|Application
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with(['product'])->get();
        return view('pages.home.cart', ['carts' => $carts]);
    }

    public function addToCart(Request $request): JsonResponse
    {
        Log::info('Request data:', $request->all());
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $user_id = auth()->user()->id;

        Cart::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);

        return response()->json(['message' => 'Item added to cart']);
    }
}
