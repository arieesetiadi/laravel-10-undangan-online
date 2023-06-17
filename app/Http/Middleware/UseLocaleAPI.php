<?php

namespace App\Http\Middleware;

use App\Constants\AppLocale;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseLocaleAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from request params
        $locale = $request->locale ?: AppLocale::EN;

        // Use locale on current request
        app()->setLocale($locale);

        return $next($request, $locale);
    }
}
