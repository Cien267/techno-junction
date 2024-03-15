<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isProvider
{

    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return redirect(route('user.get-login'));
        }

        if ($user->isProvider()) {
            return $next($request);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect(route('user.get-login'));
        }
    }
}
