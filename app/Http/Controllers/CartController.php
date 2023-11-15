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
        $carts = Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get();
        return view('pages.home.cart', ['carts' => $carts]);
    }

    public function addToCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cart) {
            Cart::where('user_id', $user_id)->where('product_id', $product_id)
                ->update(['quantity' => $quantity]);
            return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get());
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
            return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get());
        }
    }

    public function updateCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $user_id = auth()->user()->id;

        Cart::where('user_id', $user_id)->where('product_id', $product_id)
            ->update(['quantity' => $quantity]);

        return response()-> json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get());
    }

    public function deleteCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $user_id = auth()->user()->id;

        Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        toastr()->success('Item deleted from cart', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get());
    }
}
