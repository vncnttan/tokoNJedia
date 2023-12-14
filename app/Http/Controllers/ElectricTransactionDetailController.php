<?php

namespace App\Http\Controllers;

use App\Models\ElectricTransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ElectricTransactionDetailController extends Controller
{
    public function electricOrder(Request $request)
    {
        $userId = auth()->user()->id;
        $subscriptionNumber = $request->subscriptionNumber;
        $nominal = $request->nominal;

        $messages = [
            'subscriptionNumber.required' => "SN Must Be Filled",
            'subscriptionNumber.min' => "SN Must Be At Least 11 Characters",
            'subscriptionNumber.max' => "SN Must Not More Than 12 Characters",
            'subscriptionNumber.numeric' => "Subscription Number Must Be Numeric",
            'nominal.required' => "Nominal Must Be Filled",
            'nominal.numeric' => "Nominal Must Be Numeric",
            'nominal.min' => "Nominal Must Be At Least 10000",
            'nominal.max' => "Nominal Must Not More Than 1000000",
        ];
        $validate = Validator::make($request->all(), [
            'subscriptionNumber' => ['required', 'min_digits:11', 'max_digits:12', 'numeric'],
            'nominal' => ['required', 'numeric', 'min:10000', 'max:1000000'],
        ], $messages);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withErrors($validate)->withInput($request->input);
        }

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
