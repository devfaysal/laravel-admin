<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('laravel-admin::permissions.index', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('laravel-admin::permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Permission::create(['name' => $request->name]);
        
        Session::flash('message', 'Permission created Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/permissions');
        
    }
}