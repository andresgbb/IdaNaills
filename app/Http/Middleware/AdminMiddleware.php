<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
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
        $user = Auth::user(); // Obtener el usuario autenticado
        $userId= $user->id;
        $role = DB::table('role_user')
                ->where('user_id', $userId)
                ->pluck('role_id')
                ->first();
        if ($user && $role == 1) {
            return $next($request);
        }
        return redirect('/');
    }


}



