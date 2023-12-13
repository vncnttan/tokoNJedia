<?php

namespace App\Http\Middleware;

use App\Models\Merchant;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerMiddleware
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
        if (!auth()->user()->id) {
            return redirect()->route('login');
        }
        $userId = auth()->user()->id;
        $merchant = Merchant::where('user_id', $userId)->first();
        if ($merchant){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
