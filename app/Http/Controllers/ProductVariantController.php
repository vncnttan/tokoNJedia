<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function destroy($id){
        $p = ProductVariant::find($id);
        if($p!=null){
            $p->delete();
            toastr()->success("Delete product variant success", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }else{
            toastr()->error("Delete product variant failed", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }
        return redirect()->back();
    }
}
