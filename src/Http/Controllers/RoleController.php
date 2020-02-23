<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('laravel-admin::roles.index', [
            'roles' => $roles
        ]);
    }

    public function show(Role $role)
    {
        return view('laravel-admin::roles.show', [
            'role' => $role,
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('laravel-admin::roles.create', [
            'permissions' => $permissions->pluck('name')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

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
        return view('laravel-admin::roles.edit', [
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
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        if($request->permissions){
            $role->syncPermissions($request->permissions);
        }
        
        Session::flash('message', 'Role updated Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/roles');
    }

    public function datatable()
    {
        $roles = Role::all();

        return DataTables::of($roles)
            ->addColumn('action', function($role) {
                $string  = '<a class="btn btn-sm btn-oval btn-info" href="'. route('roles.edit', $role->id) .'">Edit</a>';
                $string .= ' <a class="btn btn-sm btn-oval btn-primary" href="'. route('roles.show', $role->id) .'">Show</a>';
                return $string;
            })
            ->addColumn('permissions', function($role) {
                $string = '';
                foreach ($role->permissions as $permission){
                    $string .= '<span class="badge badge-success">'. $permission->name .'</span> ';
                }
                return $string;
            })
            ->rawColumns(['action', 'permissions'])
            ->make(true);
    }
}
