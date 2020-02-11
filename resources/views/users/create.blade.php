@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    {!! Form::open(['url' => '/admin/users', 'method' => 'POST']) !!}
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Create New user</h4>
                        </div>
                        @include('laravel-admin::users.form', [
                            'user' => new App\User(),
                            'buttonText' => 'Create'
                        ])
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="form-group">
                            @include('laravel-admin::form.fields.checkbox-multiple', [
                                'id' => 'roles',
                                'title' => 'Roles',
                                'data' => $roles,
                                'values' => []
                            ])
                        </div>
                        <div class="form-group">
                            @include('laravel-admin::form.fields.checkbox-multiple', [
                                'id' => 'permissions',
                                'title' => 'Permissions',
                                'data' => $permissions,
                                'values' => []
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</section>
@endsection