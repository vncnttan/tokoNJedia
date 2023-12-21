<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(): Factory|View|Application
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant', 'product.productImages', 'ProductVariant'])->get()
        ->map(function ($cart) {
            $cart->promoInformation = getProductAfterPromo($cart->variant_id);
            return $cart;
        });
        return view('pages.home.cart', ['carts' => $carts]);
    }

    public function addToCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $variant_id = $request->variant_id;
        $quantity = $request->quantity;
        $user_id = auth()->user()->id;


        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cart) {
            Cart::where('user_id', $user_id)->where('product_id', $product_id)->where('variant_id', $variant_id)
                ->update(['quantity' => $quantity]);
        } else {
            Cart::create([
                'user_id' => $user_id,
                'variant_id' => $variant_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
        return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant'])->get());
    }

    public function updateCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $user_id = auth()->user()->id;

        Cart::where('user_id', $user_id)->where('product_id', $product_id)
            ->update(['quantity' => $quantity]);

        return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant', 'productVariant'])->get()->map(function ($cart) {
            $cart->promoInformation = getProductAfterPromo($cart->variant_id);
            return $cart;
        }));
    }

    public function deleteCart(Request $request): JsonResponse
    {
        $product_id = $request->product_id;
        $user_id = auth()->user()->id;

        Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        toastr()->success('Item deleted from cart', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return response()->json(Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant', 'productVariant'])->get()->map(function ($cart) {
            $cart->promoInformation = getProductAfterPromo($cart->variant_id);
            return $cart;
        }));
    }

    public function shipment() {
        $user = User::where('id', auth()->user()->id)->with(['location'])->first();
        $cart = Cart::where('user_id', auth()->user()->id)->with(['product', 'product.merchant', 'product.merchant.location', 'productVariant'])->get()
            ->map(function ($cart) {
                $cart->promoInformation = getProductAfterPromo($cart->variant_id);
                return $cart;
            });
        $shipment = DB::table('shipments')->get();
        return view('pages.home.checkout', ['carts' => $cart, 'user' => $user, 'shipment' => $shipment]);
    }
}
