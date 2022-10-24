<?php

namespace App\Http\Middleware;

use App\Traits\ApiRespons;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ApiRespons;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            $this->createResponse('Unauthenticated Access', $request->url(), [
                'data' => 'Please authenticate your self as an user'
            ], 401);
        } else {
            return route('login.index');
        }
    }
}
