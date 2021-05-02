<?php

namespace App\UI\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        $locale = $request->header('Content-Language');

        if (!isset($locale)) {
            $locale = config('app.locale');
        }

        config(['app.locale' => $locale]);

        $response = $next($request);
        $response->headers->set('Content-Language', $locale);
        return $response;
    }
}
