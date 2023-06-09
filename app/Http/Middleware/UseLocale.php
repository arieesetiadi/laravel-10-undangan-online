<?php

namespace App\Http\Middleware;

use App\Constants\AppLocale;
use Closure;
use Illuminate\Http\Request;

class UseLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $locale = null)
    {
        // Define default locale
        $defaultLocale = (session('locale') ?? app()->getLocale());

        $locales = AppLocale::values();
        $locale = $locale ?? $request->locale;

        // Validate locale
        if (! in_array($locale, $locales)) {
            return redirect()->route($request->route()->getName(), $defaultLocale);
        }

        // Use locale on current request
        app()->setLocale($locale);

        return $next($request, $locale);
    }
}
