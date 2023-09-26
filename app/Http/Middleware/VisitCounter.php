<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class VisitCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $cookieName = 'site_visits';
        $visitCookie = Cookie::get($cookieName);

        if (!$visitCookie) {
            $count = 1;
        } else {
            $count = (int)$visitCookie + 1;
        }

        // Mettez à jour le cookie avec le nouveau compteur
        Cookie::queue($cookieName, $count, 60 * 24 * 30); // Le cookie expire après 30 jours

        return $next($request);
    }
}
