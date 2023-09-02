<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ResponseCachingMiddleware
{
    protected string $key = 'Request-Cache-Id';

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (! $request->hasHeader($this->key)) return $next($request);
        $cache = Cache::get($request->header($this->key));
        if (! $cache) return $next($request);
        // TODO: JSON以外でも果たしていけるのか？（ファイルとか）
        return $cache;
    }

    /**
     * Handle response after response returned
     *
     * @param Request $request
     * @param Response|JsonResponse $response
     * @return void
     */
    public function terminate(Request $request, Response|JsonResponse $response): void
    {
        if (! $request->hasHeader($this->key)) return;
        // TODO: ここがゆるい
        if ($response->status() <= 399) {
            // TODO: サイズ問題が発生する？
            Cache::set($request->header($this->key), $response);
        }
    }
}
