<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 9/1/20
 * Time: 4:56 PM
 */

namespace App\Http\Middleware;

use App\Utils\AppInitializer;
use Closure;
use Illuminate\Support\Facades\Schema;

class CheckRegister
{
    public function handle($request, Closure $next)
    {
        AppInitializer::initDatabase();

        if (session('relationship') == null) {
            return redirect(url('/'));
        }

        return $next($request);
    }

}