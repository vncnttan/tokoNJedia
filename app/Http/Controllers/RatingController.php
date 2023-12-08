<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RatingController extends Controller
{
    //
    public function index($transactionId, $productId): Factory|View|Application
    {
        $userId = auth()->user()->id;
        $transactionDetail = TransactionDetail::whereHas('transactionHeader', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['transactionHeader', 'transactionHeader.ratings'])
            ->where('transaction_id', $transactionId)
            ->where('product_id', $productId)
            ->first();

        return view('pages.review.add-review', ['transactionDetail' => $transactionDetail]);
    }

    public function addReview() {
        //
    }
}
