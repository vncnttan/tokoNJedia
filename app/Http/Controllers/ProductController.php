<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductPromo;
use App\Models\ProductVariant;
use App\Services\StorageService;
use App\View\Components\RecommendedProduct;
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
        $messages = [
            'name.required' => 'Product Name is required',
            'name.min' => 'Product Name at least 3 characters',
            'name.max' => 'Product Name at most 50 characters',
            'product_category.required' => 'Product Category is required',
            'images.required' => 'Product Image is required',
            'images.min' => 'Product Image at least 1 image',
            'condition.required' => 'Product Condition is required',
            'description.required' => 'Product Description is required',
            'description.min' => 'Product Description at least 5 characters',
            'description.max' => 'Product Description at most 250 characters',
            'variant_name.required' => 'Product Variant Name is required',
            'variant_name.min' => 'Product Variant Name at least 3 characters',
            'variant_name.max' => 'Product Variant Name at most 50 characters',
            'variant_price.required' => 'Product Variant Price is required',
            'variant_price.numeric' => 'Product Variant Price a number',
            'variant_stock.required' => 'Product Variant Stock is required',
            'variant_stock.numeric' => 'Product Variant Stock a number',
            'variant_stock.min' => 'Product Variant Stock at least 1',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'product_category' => 'required',
            'images' => 'required|array|min:1',
            'condition' => 'required',
            'description' => 'required|min:5|max:250',
            'variant_name' => 'required|array|min:1',
            'variant_name.*' => 'min:3|max:50',
            'variant_price' => 'required|array|min:1',
            'variant_price.*' => 'numeric',
            'variant_stock' => 'required|array',
            'variant_stock.*' => 'required|numeric|min:1'
        ], $messages);
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
                $res = StorageService::uploadFile("images/product/".$product->name, $file);
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
        $product = Product::find($id);
        if ($product != null) {
            Controller::SuccessMessage("Delete Product Success");
            $product->delete();
        }
        return redirect()->back();
    }

    public function search($keyword)
    {
        $products = Product::where('name', 'like', '%' . $keyword . '%')->simplePaginate(12);
        $productCount = Product::where('name', 'like', '%' . $keyword . '%')->count();
        $stores = Merchant::with(['products'])->where('name', 'like', '%' . $keyword . '%')->get();
        return view('pages.home.search-page', compact('products', 'keyword', 'stores', 'productCount'));
    }

    public function lazyLoad(Request $request)
    {
        $requestCount = $request->requestCount;
        $recommendedProducts = app(RecommendedProduct::class)->getRecommendedProducts($requestCount);
        return view('components.product-card-loop-load', ['products' => $recommendedProducts])->render();
    }

    public function deals($promoId)
    {
        $productPromos = ProductPromo::where('promo_id', 'like', $promoId)->get();
        return view('pages.home.deals', ['productPromos' => $productPromos]);
    }
}
