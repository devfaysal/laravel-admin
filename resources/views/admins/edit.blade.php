@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="/admin/admins/{{ $admin->id }}">
        @csrf
        @method('PATCH')
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Edit Admin</h4>
                        </div>
                        @include('laravel-admin::admins.form', [
                            'admin' => $admin,
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
                        <x-checkbox-multiple name="roles" label="Roles" :data="$roles" :values="$admin->roles->pluck('name')->toArray()"/>
                        <x-checkbox-multiple name="permissions" label="Permissions" :data="$permissions" :values="$admin->permissions->pluck('name')->toArray()"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection