<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XssProtection
{
    public function handle(Request $request, Closure $next)
    {
        if($request->getMethod() == 'POST' || $request->getMethod() == 'PUT' || $request->getMethod() == 'PATCH') {
            $input = array_filter($request->except('_token'));

            $html_event_attributes = array('onload','onunload','onclick','ondblclick','onmousedown','onmouseup','onmouseover','onmousemove','onmouseout','onkeypress','onkeydown','onkeyup','onfocus','onblur','onsubmit','onreset','onchange','onselect','oninput','oncontextmenu');

            array_walk_recursive($input, function (&$input) use ($html_event_attributes) {
                $input = strip_tags(str_replace(array("&lt;", "&gt;"), '', $input), '<span><p><a><b><i><u><strong><br><hr><table><tr><th><td><ul><ol><li><h1><h2><h3><h4><h5><h6><del><ins><sup><sub><pre><address><img><figure><embed><iframe><video><style>');

                foreach ($html_event_attributes as $attribute) {
                    $input = str_replace($attribute, '', $input);
                }
            });

            $request->merge($input);
        }
        return $next($request);
    }
}