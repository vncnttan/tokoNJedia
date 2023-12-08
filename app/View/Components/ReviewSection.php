<?php

namespace App\View\Components;

use App\Models\Rating;
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
        $Ratings = Rating::with(['user', 'transactionHeader', 'productVariant'])
            ->where('product_id', $this->productId)
            ->get();
        return view('components.review-section');
    }
}
