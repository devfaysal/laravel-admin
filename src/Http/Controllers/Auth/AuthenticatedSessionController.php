<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers\Auth;

use Carbon\Carbon;
use Devfaysal\LaravelAdmin\Http\Controllers\Controller;
use Devfaysal\LaravelAdmin\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('laravel-admin::auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $admin = Auth::guard('admin')->user();
        $admin->last_login_at = Carbon::now()->toDateTimeString();
        $admin->last_login_ip = $request->getClientIp();
        $admin->save();

        return redirect()->route('admins.dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admins.login');
    }
}
