<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\View;

class Authenticate extends Middleware
{
    public function __construct(Auth $auth)
    {
        parent::__construct($auth);
        if(isset($auth->user()->id)){
            View::share('logged_in_user', $auth->user());
        }else {
            return redirect()->route('home');
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
