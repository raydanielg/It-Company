<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HtmlSpecialchars
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $input = array_filter($request->all());

        array_walk_recursive($input, function (&$input) {
            $input = htmlspecialchars($input, ENT_QUOTES);
        });

        $request->merge($input);

        return $next($request);
    }
}
