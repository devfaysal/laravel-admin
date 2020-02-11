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
                            <label class="control-label">Roles</label>
                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {{ Form::checkbox('roles[]', $role->name, false, ['class' => 'checkbox']) }}
                                        <span>{{$role->name}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label class="control-label">Permissions</label>
                            @foreach ($permissions as $permission)
                                <div>
                                    <label>
                                        {{ Form::checkbox('permissions[]', $permission->name, false, ['class' => 'checkbox']) }}
                                        <span>{{$permission->name}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</section>
@endsection