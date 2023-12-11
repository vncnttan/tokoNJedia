<?php

namespace App\Http\Middleware;

use App\Models\Merchant;
use App\Models\Product;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductExists
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $productId = $request->route()->parameter('id');
        if ($productId == null) {
            return redirect('/404');
        }
        if (Product::find($productId) == null) {
            return redirect('/404');
        }
        return $next($request);
    }
}
