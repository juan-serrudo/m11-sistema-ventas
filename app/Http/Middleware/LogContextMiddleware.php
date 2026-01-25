<?php

namespace App\Http\Middleware;

use App\Support\Release;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LogContextMiddleware
{
    /**
     * @param  Closure(Request): \Symfony\Component\HttpFoundation\Response  $next
     */
    public function handle(Request $request, Closure $next)
    {
        Log::withContext([
            'release' => Release::releaseId(),
            'env' => app()->environment(),
            'user_id' => auth()->id(),
            'request_id' => (string) Str::uuid(),
        ]);

        return $next($request);
    }
}
