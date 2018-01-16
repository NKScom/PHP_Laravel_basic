<?php

namespace App\Http\Middleware;

use Closure, Session, App, Config;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $locate = Session::has('locate') ? Session::get('locate', Config::get('app.locate')) : 'en';

        App::setLocale($locate);

        return $next($request);
    }
}
