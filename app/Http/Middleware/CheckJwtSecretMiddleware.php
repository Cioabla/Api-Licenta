<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 6/6/2018
 * Time: 9:48 PM
 */

namespace App\Http\Middleware;

use Closure;


class CheckJwtSecretMiddleware
{
    public function handle($request, Closure $next)
    {

        if($request->header('JWT') == env('JWT_SECRET'))
        {
//            return response()->json(env('JWT_KEY'));
            return $next($request);
        }else{

            abort(404,"You're not authorized");
        }


    }
}