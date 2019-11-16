<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', [
            'role' => $role,
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', [
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);

        if($request->permissions){
            $role->givePermissionTo($request->permissions);
        }
        
        Session::flash('message', 'Role created Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/roles');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => $request->name
        ]);

        if($request->permissions){
            $role->syncPermissions($request->permissions);
        }
        
        Session::flash('message', 'Role updated Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/roles');
    }
}
