<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->segment(1), ['es', 'en'])) {
            URL::defaults(['locale' => $request->segment(1)]);
            app()->setLocale($request->segment(1));
        } else {
            URL::defaults(['locale' => 'es']);
            app()->setLocale('es');
        }
        
        return $next($request);
    }
}
