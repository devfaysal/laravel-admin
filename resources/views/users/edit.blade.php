@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="/admin/users/{{ $user->id }}">
        @csrf
        @method('PATCH')
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Edit user</h4>
                        </div>
                        @include('laravel-admin::users.form', [
                            'user' => $user,
                            'buttonText' => 'Edit'
                        ])
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="form-group">
                            @include('laravel-admin::form.checkbox-multiple', [
                                'name' => 'roles',
                                'label' => 'Roles',
                                'data' => $roles,
                                'values' => $user->roles->pluck('name')->toArray()
                            ])
                        </div>
                        <div class="form-group">
                            @include('laravel-admin::form.checkbox-multiple', [
                                'name' => 'permissions',
                                'label' => 'Permissions',
                                'data' => $permissions,
                                'values' => $user->permissions->pluck('name')->toArray()
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection