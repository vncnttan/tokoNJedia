<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        $merchant = $user->Merchant;
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'product_category' => 'required',
            'images' => 'required',
            'condition' => 'required',
            'description' => 'required|min:5',
            'variant_name' => 'required|min:3|max:50',
            'variant_price' => 'required'
        ]);
        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = 50;
        $product->merchant_id = $merchant->id;
        $product->product_category_id = $request->product_category;
        $product->condition = $request->condition;
        $product->save();

        foreach ($request->images as $i) {
            if ($i != null) {
                $file = $i('file');
                $res = FirebaseService::uploadFile("images", $file);
                if ($res === null) {
                    toastr()->error('Upload Product Variant Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                    return redirect()->back();
                }
                $product_image = new ProductImage();
                $product_image->name = env("FIREBASE_URL") . "v0/b/" . env("FIREBASE_STORAGE_BUCKET") . "o/images%2F" . $res . "?alt=media";
                $product_image->product_id = $product->id;
                $product_image->save();
            }
        }
        foreach ($request->variant_name as $index => $name) {
            $price = $request->variant_price[$index];
            $product_variant = new ProductVariant();
            $product_variant->name = $name;
            $product_variant->price = $price;
            $product_variant->product_id = $product->id;
            $product_variant->save();
        }
        return redirect()->back();

        // dd($request->input());
    }

    public function destroy($id)
    {
        // dd($id);
        $product = Product::find($id);
        if ($product != null) {
            $product->delete();
        }
        return redirect()->back();
    }
}
