<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionDetailController extends Controller
{
    function addTransaction(Request $request){
        Log::info($request->shipment_ids);
    }
}
