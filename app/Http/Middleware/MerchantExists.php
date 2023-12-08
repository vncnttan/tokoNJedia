<?php

namespace App\Http\Middleware;

use App\Models\Merchant;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MerchantExists
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
        $merchantId = $request->route()->parameter('id');
        if ($merchantId != null) {
            if (Merchant::find($merchantId) == null) {
                return redirect('/404');
            }
        }
        return $next($request);
    }
}
