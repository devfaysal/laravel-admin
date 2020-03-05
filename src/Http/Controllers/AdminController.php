<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Devfaysal\LaravelAdmin\Models\Admin;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $admins = auth()->user()->hasPermissionTo('manage_trashed_admins', 'admin') ? Admin::withTrashed()->get() : Admin::all();

        return view('laravel-admin::admins.index', [

            'admins' => $admins

        ]);
    }

    public function show(Admin $admin)
    {
        return view('laravel-admin::admins.show', [

            'admin' => $admin

        ]);
    }

    public function create()
    {
        $permissions = Permission::where('guard_name', 'admin')->get();
        $roles = Role::where('guard_name', 'admin')->get();
        return view('laravel-admin::admins.create', [
            'roles' => $roles->pluck('name'),
            'permissions' => $permissions->pluck('name')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if($request->roles){
            $admin->assignRole($request->roles);
        }

        if($request->permissions){
            $admin->givePermissionTo($request->permissions);
        }
        

        Session::flash('message', 'Admin created Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/admins');
    }

    public function edit(Admin $admin)
    {
        $permissions = Permission::where('guard_name', 'admin')->get();
        $roles = Role::where('guard_name', 'admin')->get();
        return view('laravel-admin::admins.edit', [
            'admin' => $admin,
            'roles' => $roles->pluck('name'),
            'permissions' => $permissions->pluck('name')
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id
        ]);

        if($request->password){
            $attributes['password'] = Hash::make($request->password);
        }

        $admin->update($attributes);

        if($request->roles){
            $admin->syncRoles($request->roles);
        }
        if($request->permissions){
            $admin->syncPermissions($request->permissions);
        }
        
        Session::flash('message', 'Admin updated Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/admins');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        Session::flash('message', 'Admin deleted Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/admins');
    }

    public function restore($id)
    {
        $admin = Admin::withTrashed()->findOrFail($id);
        $admin->restore();

        Session::flash('message', 'Admin restored Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/admins');
    }

    public function datatable()
    {
        $admins = auth()->user()->hasPermissionTo('manage_trashed_admins', 'admin') ? Admin::withTrashed()->get() : Admin::all();

        return DataTables::of($admins)
            ->addColumn('action', function($admin) {
                $string = '';
                if($admin->trashed()){
                    $string .= '<a class="btn btn-sm btn-oval btn-warning" href="'. route('admins.restore', $admin->id) .'">Restore</a> ';
                }
                $string .= '<a class="btn btn-sm btn-oval btn-info" href="'. route('admins.edit', $admin->id) .'">Edit</a>';
                $string .= ' <a class="btn btn-sm btn-oval btn-primary" href="'. route('admins.show', $admin->id) .'">Show</a>';
                return $string;
            })
            ->addColumn('roles', function($admin) {
                $string = '';
                foreach ($admin->roles as $role){
                    $string .= '<span class="badge badge-success">'. $role->name .'</span> ';
                }
                return $string;
            })
            ->addColumn('last_login_at', function($admin) {
                return $admin->last_login_at ? '<span class="badge badge-success">' . $admin->last_login_at->format('d M Y h:i:s A') . '</span>' : '<span class="badge badge-warning">Never Logged In</span>';
            })
            ->rawColumns(['action', 'roles', 'last_login_at'])
            ->make(true);
    }
}
