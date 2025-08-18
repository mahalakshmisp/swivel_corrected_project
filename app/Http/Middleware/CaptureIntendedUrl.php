<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CaptureIntendedUrl
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->filled('intended')) {
            $intended = trim((string) $request->input('intended'));

            // Accept relative paths or same-host absolute URLs (handles localhost vs 127.0.0.1)
            $ok = false;
            if (str_starts_with($intended, '/')) {
                $ok = true;
            } else {
                $parts = parse_url($intended);
                $host = $parts['host'] ?? null;
                if ($host && strcasecmp($host, $request->getHost()) === 0) {
                    $ok = true;
                }
            }

            if ($ok) {
                session(['url.intended' => $intended]);
            }
        }

        return $next($request);
    }
}
