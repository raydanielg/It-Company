<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;
use App\Models\Language;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if there is any session data for language, if not put the default language into the session variable.
        if(session('sess_lang_code') == null) {
            $default_language = Language::where('default',1)->first();
            session(['sess_lang_name' => $default_language->name]);
            session(['sess_lang_code' => $default_language->code]);
            session(['sess_lang_direction' => $default_language->direction]);
        }

        // Set the application language based on the session data.
        App::setLocale(session('sess_lang_code'));

        return $next($request);
    }
}
