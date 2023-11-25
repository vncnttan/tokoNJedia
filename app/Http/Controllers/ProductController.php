<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        $merchant = $user->Merchant;
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'product_category' => 'required',
            'images' => 'required|array|min:1',
            'condition' => 'required',
            'description' => 'required|min:5',
            'variant_name' => 'required|array|min:1',
            'variant_name.*' => 'min:3|max:50',
            'variant_price' => 'required|array|min:1',
            'variant_price.*' => 'numeric',
            'variant_stock' => 'required|array',
            'variant_stock.*' => 'required|numeric|min:1'
        ]);
        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withInput();
        }
        $product = new Product();
        $product->id = Str::uuid(36);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->merchant_id = $merchant->id;
        $product->product_category_id = $request->product_category;
        $product->condition = $request->condition;
        $product->save();

        foreach ($request->images as $i) {
            if ($i != null) {
                $file = $i;
                $res = FirebaseService::uploadFile("images", $file);
                if ($res === null) {
                    toastr()->error('Upload Product Variant Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                    return redirect()->back();
                }
                $product_image = new ProductImage();
                $product_image->id = Str::uuid(36);
                $product_image->image = $res;
                $product_image->product_id = $product->id;
                $product_image->save();
            }
        }
        foreach ($request->variant_name as $index => $name) {
            $price = $request->variant_price[$index];
            $stock = $request->variant_stock[$index];
            $product_variant = new ProductVariant();
            $product_variant->id = Str::uuid(36);
            $product_variant->name = $name;
            $product_variant->price = $price;
            $product_variant->stock = $stock;
            $product_variant->product_id = $product->id;
            $product_variant->save();
        }
        return redirect('/merchant/manage-product');

        // dd($request->input());
    }

    public function destroy($id)
    {
        // dd($id);
        $product = Product::find($id);
        if ($product != null) {
            Controller::SuccessMessage("Delete Product Success");
            $product->delete();
        }
        return redirect()->back();
    }

    public function search($keyword)
    {
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        $stores = Merchant::with(['products'])->where('name', 'like', '%' . $keyword . '%')->get();
        return view('pages.home.search-page', compact('products', 'keyword', 'stores'));
    }
}
