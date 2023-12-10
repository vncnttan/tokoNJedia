<?php

namespace App\View\Components;

use App\Models\Rating;
use App\Models\RatingImage;
use App\Models\RatingVideo;
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
        $ratings = Rating::with(['user', 'transactionHeader'])
            ->where('product_id', $this->productId)
            ->paginate(5);
        $recommendedImages = RatingImage::with('rating')
            ->whereHas('rating', function ($query) {
                $query->where('product_id', $this->productId);
            })
            ->limit(3)
            ->get();
        $recommendedVideos = RatingVideo::with('rating')
            ->whereHas('rating', function ($query) {
                $query->where('product_id', $this->productId);
            })
            ->limit(3)
            ->get();
        return view('components.review-section', ['reviews' => $ratings, 'recommendedImages' => $recommendedImages, 'recommendedVideos' => $recommendedVideos]);
    }
}
