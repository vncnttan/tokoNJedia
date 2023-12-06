<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HaveItemsInCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->carts->count() < 1) {
            toastr()->error('Please add items to cart first');
            return redirect('/');
        }
        return $next($request);
    }
}
