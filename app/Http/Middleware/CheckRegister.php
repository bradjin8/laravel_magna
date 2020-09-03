<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 9/1/20
 * Time: 4:56 PM
 */

namespace App\Http\Middleware;

use Closure;

class CheckRegister
{
    public function handle($request, Closure $next) {
        if (
//            !$request->session()->exist('relationship') ||
//            !$request->session()->exist('country') ||
//            !$request->session()->exist('how')
                session('relationship') == null
        ) {
            return redirect('/');
        }

        return $next($request);
    }

}