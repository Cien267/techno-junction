<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

class CustomErrorHandling
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem route có tồn tại hay không
        if (!Route::has($request->route()->getName())) {
            // Route không tồn tại, trả về trang 404

            return new RedirectResponse(route('error.404'), 404);
        }

        // Nếu có lỗi, trả về trang 500
        if (app()->isDownForMaintenance()) {
            return view('errors.500');
        }

        return $next($request);
    }
}
