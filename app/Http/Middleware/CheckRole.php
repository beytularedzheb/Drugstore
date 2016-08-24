<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckRole {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role) {
        if (!$request->user()->hasRole($role)) {
            Session::flash('flash_message', trans('messages.no_user_permission'));
            Session::flash('flash_msg_type', 'danger');

            return redirect()->back();
        }

        return $next($request);
    }

}
