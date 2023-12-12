<?php

namespace App\Http\Middleware;

use App\Models\TransactionDetail;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateReviewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $transactionId = $request->route()->parameter('transactionId');
        $productId = $request->route()->parameter('productId');

        $userId = auth()->user()->id;

        $transactionDetail = TransactionDetail::whereHas('transactionHeader', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['transactionHeader', 'transactionHeader.reviews'])
            ->where('transaction_id', $transactionId)
            ->where('product_id', $productId)
            ->first();


        if ($transactionDetail == null || $transactionDetail->transactionHeader->reviews->count() > 0) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
