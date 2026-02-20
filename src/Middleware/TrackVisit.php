<?php

namespace Linky\Tracker\Middleware;

use Closure;
use Linky\Tracker\Services\LinkyClient;

class TrackVisit
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('GET')) {
            \app(LinkyClient::class)->sendVisit($request);
        }

        return $next($request);
    }
}