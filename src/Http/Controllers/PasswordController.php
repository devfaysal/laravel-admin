<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    public function index()
    {
        return view('laravel-admin::auth.password-change');
    }

    public function update(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            $request->validate([
                'new_password' => 'required|confirmed|min:6',
            ]);
            
            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            Auth::logout();

            return redirect()->route('admins.login');
        }else{
            Session::flash('message', 'Old Password Does not match!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

}
