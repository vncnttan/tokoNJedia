<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Rating;
use App\Models\RatingImage;
use App\Models\RatingReply;
use App\Models\RatingVideo;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Services\StorageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $validate = Validator::make($request->all(), [
            'video' => 'file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:50000',
        ]);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withInput();
        }

        $message = $request->message;
        $rating = $request->rating;

        $ratingId = Str::uuid();

        $newRating = new Rating();
        $newRating->id = $ratingId;
        $newRating->user_id = auth()->user()->id;
        $newRating->transaction_id = $request->transaction_id;
        $newRating->product_id = $request->product_id;
        $newRating->rating = $rating;
        $newRating->message = $message;
        $newRating->save();


        foreach ($request->images as $i) {
            if ($i != null) {
                $file = $i;
                $image_path = "images/review/" . $request->transaction_id . '/' . auth()->user()->id . '/' . $request->product_id;
                $res = StorageService::uploadFile($image_path, $file);
                if ($res === null) {
                    toastr()->error('Upload Product Variant Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                    return redirect()->back();
                }
                $rating_image = new RatingImage();
                $rating_image->id = Str::uuid(36);
                $rating_image->image = $res;
                $rating_image->rating_id = $ratingId;
                $rating_image->save();
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
                    $rating_video = new RatingVideo();
                    $rating_video->id = Str::uuid(36);
                    $rating_video->video = $res;
                    $rating_video->rating_id = $ratingId;
                    $rating_video->save();
                }
            }
        }

        return redirect('/profile/transaction');
    }

    public function addReply(Request $request) {
        $newReply = new RatingReply();
        $newReply->id = Str::uuid();
        $newReply->rating_id = $request->rating_id;
        $newReply->reply = $request->reply;
        $newReply->save();
        return redirect()->back();
    }
}
