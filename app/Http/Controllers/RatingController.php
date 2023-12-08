<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RatingController extends Controller
{
    //
    public function index(): Factory|View|Application
    {
        return view('pages.review.add-review');
    }

    public function addReview() {
        //
    }
}
