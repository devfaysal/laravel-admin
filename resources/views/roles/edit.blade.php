@extends('admin.layouts.app')
@section('content')
<section class="section">
    <form role="form" method="POST" action="/admin/roles/{{$role->id}}">
        @csrf
        @method('patch')
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Edit Role</h4>
                            @if ($errors->any())
                            <div class="field mt-6">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red">{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="name">Role Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$role->name}}">
                        </div>
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
                        <div class="form-group">
                            <label class="control-label">Permissions</label>
                            @foreach ($permissions as $permission)
                                <div>
                                    <label>
                                        <input class="checkbox" type="checkbox" name="permissions[]" value="{{$permission->name}}" {{$permission->roles()->where('id', $role->id)->exists() ? 'checked' : ''}}>
                                        <span>{{$permission->name}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection