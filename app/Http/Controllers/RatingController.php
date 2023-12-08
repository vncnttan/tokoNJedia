<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RatingController extends Controller
{
    //
    public function index($transactionId, $productId): Factory|View|Application
    {
        $userId = auth()->user()->id;

        $transactionHeader = TransactionHeader::where('id', $transactionId)
            ->whereHas('user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })
            ->with(['transactionDetails', 'transactionDetails.productVariant'])
            ->first();

        if (!$transactionHeader) {
            abort(404, 'Transaction not found');
        }

        $allVariantsInTransaction = $transactionHeader->transactionDetails->pluck('productVariant');


        $transactionDetail = TransactionDetail::whereHas('transactionHeader', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['transactionHeader', 'transactionHeader.ratings', 'product', 'product.merchant', 'product.productImages', 'product.merchant.location', 'shipment', 'productVariant'])
            ->where('transaction_id', $transactionId)
            ->where('product_id', $productId)
            ->first();

        return view('pages.review.add-review', ['transactionDetail' => $transactionDetail, 'allVariantsInTransaction' => $allVariantsInTransaction]);
    }

    public function addReview()
    {
        //
    }
}
