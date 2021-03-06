<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class SetupCheckMiddleware
 *
 * @package App\Http\Middleware
 */
class SetupCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('setup/*')) {
            // Skip check if current route targets the setup
            return $next($request);
        }

        if (env('SETUP_COMPLETED', false) !== true) {
            // Start the setup if it was not completed yet
            return redirect()->route('setup.welcome');
        }

        return $next($request);
    }
}
