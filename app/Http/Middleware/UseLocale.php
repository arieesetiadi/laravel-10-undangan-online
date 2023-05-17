<?php

namespace App\Http\Middleware;

use App\Constants\Locale;
use Closure;
use Illuminate\Http\Request;

class UseLocale
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
        $locale = session('locale') ?? Locale::EN;
        app()->setLocale($locale);

        return $next($request, $locale);
    }
}
