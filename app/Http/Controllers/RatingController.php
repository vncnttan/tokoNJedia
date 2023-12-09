<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function addReview(Request $request)
    {
        $images = $request->images;
        $message = $request->message;
        $rating = $request->rating;

        $newRating = new Rating();
        $newRating->id = Str::uuid();
        $newRating->user_id = auth()->user()->id;
        $newRating->transaction_id = $request->transaction_id;
        $newRating->product_id = $request->product_id;
        $newRating->rating = $rating;
        $newRating->message = $message;

        $newRating->save();
        return redirect('/profile/transaction');
    }
}
