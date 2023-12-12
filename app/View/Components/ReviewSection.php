<?php

namespace App\View\Components;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\ReviewVideo;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private string $productId;
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        $reviews = Review::with(['user', 'transactionHeader', 'reviewImages', 'reviewVideos', 'reply'])
            ->where('product_id', $this->productId)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $recommendedImages = ReviewImage::with('review')
            ->whereHas('review', function ($query) {
                $query->where('product_id', $this->productId);
            })
            ->limit(3)
            ->get();
        $recommendedVideos = ReviewVideo::with('review')
            ->whereHas('review', function ($query) {
                $query->where('product_id', $this->productId);
            })
            ->limit(3)
            ->get();
        $product = Product::with('merchant', 'merchant.user')->find($this->productId);
        return view('components.review-section', ['reviews' => $reviews, 'recommendedImages' => $recommendedImages, 'recommendedVideos' => $recommendedVideos, 'merchant' => $product->merchant]);
    }
}
