<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\ReviewReply;
use App\Models\ReviewVideo;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Services\StorageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReviewController extends Controller
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
            ->with(['transactionHeader', 'transactionHeader.reviews', 'product', 'product.merchant', 'product.productImages', 'product.merchant.location', 'shipment', 'productVariant'])
            ->where('transaction_id', $transactionId)
            ->where('product_id', $productId)
            ->first();

        return view('pages.review.add-review', ['transactionDetail' => $transactionDetail, 'allVariantsInTransaction' => $allVariantsInTransaction]);
    }

    public function addReview(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'video' => 'file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:50000',
        ]);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withInput();
        }

        $message = $request->message;
        $review = $request->review;

        $reviewId = Str::uuid();

//        dd($request->images);

        $newReview = new Review();
        $newReview->id = $reviewId;
        $newReview->user_id = auth()->user()->id;
        $newReview->transaction_id = $request->transaction_id;
        $newReview->variant_bought = $request->variant_bought;
        $newReview->product_id = $request->product_id;
        $newReview->review = $review;
        $newReview->message = $message;
        $newReview->save();

        if ($request->images) {
            $count = 0;
            foreach ($request->images as $i) {
                if ($i != null) {
                    $file = $i;
                    $image_path = "images/review/" . $request->transaction_id . '/' . auth()->user()->id . '/' . $request->product_id . $count;
                    $count++;
                    $res = StorageService::uploadFile($image_path, $file);
                    if ($res === null) {
                        toastr()->error('Upload Product Variant Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                        return redirect()->back();
                    }
                    $review_image = new ReviewImage();
                    $review_image->id = Str::uuid(36);
                    $review_image->image = $res;
                    $review_image->review_id = $reviewId;
                    $review_image->save();
                }
            }
        }


        if ($request->videos) {
            foreach ($request->videos as $v) {
                if ($v != null) {
                    $file = $v;
                    $res = StorageService::uploadFile("videos/review/" . $request->transaction_id . '/' . auth()->user()->id . '/' . $request->product_id, $file);
                    if ($res === null) {
                        toastr()->error('Upload Product Variant Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                        return redirect()->back();
                    }
                    $review_video = new ReviewVideo();
                    $review_video->id = Str::uuid(36);
                    $review_video->video = $res;
                    $review_video->review_id = $reviewId;
                    $review_video->save();
                }
            }
        }

        return redirect('/profile/transaction');
    }

    public function addReply(Request $request)
    {
        $newReply = new ReviewReply();
        $newReply->id = Str::uuid();
        $newReply->review_id = $request->review_id;
        $newReply->reply = $request->reply;
        $newReply->save();
        return redirect()->back();
    }
}
