<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function index(){
        if(Auth::user()->Merchant == null){
            return redirect('/merchant/create');
        }
        return view('pages.merchant.merchant');
    }
    public function create(){
        return view('pages.merchant.merchant-create');
    }
}
