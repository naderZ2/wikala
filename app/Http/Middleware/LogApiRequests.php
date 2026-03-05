<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogApiRequests
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('API Request', [
            'method' => $request->method(),
            'url'    => $request->fullUrl(),
            'ip'     => $request->ip(),
        ]);

        $response = $next($request);

        Log::info('API Response', [
            'url'    => $request->fullUrl(),
            'status' => $response->status(),
            'body'   => $response->getContent(),
        ]);

        return $response;
    }
}
