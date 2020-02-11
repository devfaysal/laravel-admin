<?php

namespace Devfaysal\LaravelAdmin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user()->hasPermissionTo('manage_trashed_users') ? User::withTrashed()->get() : User::all();

        return view('laravel-admin::users.index', [

            'users' => $users

        ]);
    }

    public function show(User $user)
    {
        return view('laravel-admin::users.show', [

            'user' => $user

        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('laravel-admin::users.create', [
            'roles' => $roles->pluck('name'),
            'permissions' => $permissions->pluck('name')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if($request->roles){
            $user->assignRole($request->roles);
        }

        if($request->permissions){
            $user->givePermissionTo($request->permissions);
        }
        

        Session::flash('message', 'User created Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('laravel-admin::users.edit', [
            'user' => $user,
            'roles' => $roles->pluck('name'),
            'permissions' => $permissions->pluck('name')
        ]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id
        ]);

        if($request->password){
            $attributes['password'] = Hash::make($request->password);
        }

        $user->update($attributes);

        if($request->roles){
            $user->syncRoles($request->roles);
        }
        if($request->permissions){
            $user->syncPermissions($request->permissions);
        }
        
        Session::flash('message', 'User updated Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('message', 'User deleted Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/users');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        Session::flash('message', 'User restored Successfully!!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/users');
    }

    public function datatable()
    {
        $users = auth()->user()->hasPermissionTo('manage_trashed_users') ? User::withTrashed()->get() : User::all();

        return DataTables::of($users)
            ->addColumn('action', function($user) {
                $string = '';
                if($user->trashed()){
                    $string .= '<a class="btn btn-sm btn-oval btn-warning" href="'. route('users.restore', $user->id) .'">Restore</a> ';
                }
                $string .= '<a class="btn btn-sm btn-oval btn-info" href="'. route('users.edit', $user->id) .'">Edit</a>';
                $string .= ' <a class="btn btn-sm btn-oval btn-primary" href="'. route('users.show', $user->id) .'">Show</a>';
                return $string;
            })
            ->addColumn('roles', function($user) {
                $string = '';
                foreach ($user->roles as $role){
                    $string .= '<span class="badge badge-success">'. $role->name .'</span> ';
                }
                return $string;
            })
            ->rawColumns(['action', 'roles'])
            ->make(true);
    }
}
