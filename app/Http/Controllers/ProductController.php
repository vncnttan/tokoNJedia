<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function destroy($id){
        // dd($id);
        $product = Product::find($id);
        if($product != null){
            $product->delete();
        }
        return redirect()->back();
    }
}
