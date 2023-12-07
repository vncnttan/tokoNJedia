<?php

namespace App\Http\Controllers;

use App\Models\ElectricTransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ElectricTransactionDetailController extends Controller
{
    public function electricOrder(Request $request)
    {
        $userId = auth()->user()->id;
        $subscriptionNumber = $request->subscriptionNumber;
        $nominal = $request->nominal;

//        dd($nominal);

        $transactionId = Str::uuid();

        $transactionHeader = new TransactionHeader();
        $transactionHeader->id = $transactionId;
        $transactionHeader->user_id = $userId;
        $transactionHeader->location_id = null;
        $transactionHeader->date = now();
        $transactionHeader->save();

        $transactionDetail = new ElectricTransactionDetail();
        $transactionDetail->electric_token = Str::uuid();
        $transactionDetail->transaction_id = $transactionId;
        $transactionDetail->subscription_number = $subscriptionNumber;
        $transactionDetail->nominal = $nominal;
        $transactionDetail->save();

        toastr()->success('Electric Order Success');
        return redirect()->route('transaction');
    }
}
