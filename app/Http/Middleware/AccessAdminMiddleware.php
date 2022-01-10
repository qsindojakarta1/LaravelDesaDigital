<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AccessAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (getDesaFromUrl()->id != auth()->user()->desa->id) {
                Auth::logout();
                Alert::error('akses desa dilarang');
                return redirect('/login');
            }
            return $next($request);
        } catch (\Throwable $th) {
            Auth::logout();
            Alert::error($th->getMessage());
            return redirect('/login');
        }
    }
}
