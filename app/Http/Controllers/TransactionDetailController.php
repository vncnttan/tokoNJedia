<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shipment;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TransactionDetailController extends Controller
{

    function index()
    {
        return view('pages.profile.profile-page-transaction');
    }

    function addTransaction(Request $request)
    {
        $userId = auth()->user()->id;
        $details = $request->shipment_ids;

        foreach ($details as $detail) {
            if (!Shipment::find($detail['shipmentId'])) {
                toastr()->error('Shipment not found');
                return response()->json([
                    'error' => 'Shipment not found',
                ], 500);
            }
        }

        $transactionId = Str::uuid();

        $transactionHeader = new TransactionHeader();
        $transactionHeader->id = $transactionId;
        $transactionHeader->user_id = $userId;
        $transactionHeader->location_id = $request->location_id;
        $transactionHeader->date = now();
        $transactionHeader->save();

        foreach ($details as $detail) {
            $shipmentId = $detail['shipmentId'];

            $cart = Cart::where('user_id', $userId)->where('product_id', $detail["productId"])->where('variant_id', $detail["variantId"])->first();

            Log::alert($cart);
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transactionId;
            $transactionDetail->product_id = $detail["productId"];
            $transactionDetail->variant_id = $detail["variantId"];
            $transactionDetail->shipment_id = $shipmentId;
            $transactionDetail->status = 'Pending';
            $transactionDetail->quantity = $cart->quantity;
            $transactionDetail->save();

            $cart->delete();
        }

        return response()->json([
            'message' => 'Transaction success',
            'data' => null
        ], 200);
    }

    public function completeOrder(): JsonResponse
    {
        $transactionId = request()->transaction_id;
        $variantId = request()->variant_id;
        $productId = request()->product_id;
        $transactionDetail = TransactionDetail::where('transaction_id', $transactionId)->where('variant_id', $variantId)->where('product_id', $productId)->first();
        $transactionDetail->status = 'Shipping';
        $transactionDetail->save();

        return response()->json([
            'message' => 'Transaction success',
            'data' => null
        ], 200);
    }

    public function rejectOrder(): JsonResponse
    {
        $transactionId = request()->transaction_id;
        $variantId = request()->variant_id;
        $productId = request()->product_id;
        $transactionDetail = TransactionDetail::where('transaction_id', $transactionId)->where('variant_id', $variantId)->where('product_id', $productId)->first();
        $transactionDetail->status = 'Rejected';
        $transactionDetail->save();

        return response()->json([
            'message' => 'Rejection success',
            'data' => null
        ], 200);
    }

    public function shipmentDone(): JsonResponse
    {
        $transactionId = request()->transaction_id;
        $variantId = request()->variant_id;
        $productId = request()->product_id;
        $transactionDetail = TransactionDetail::where('transaction_id', $transactionId)->where('variant_id', $variantId)->where('product_id', $productId)->first();
        $transactionDetail->status = 'Completed';
        $transactionDetail->save();

        return response()->json([
            'message' => 'Shipment done',
            'data' => null
        ], 200);
    }



}
