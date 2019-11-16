@extends('admin.layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Roles </h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="/admin/roles/create">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th scope="row">{{$role->id}}</th>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge badge-success">{{$permission->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-oval btn-info" href="/admin/roles/{{$role->id}}/edit">Edit</a>
                                                <a class="btn btn-sm btn-oval btn-primary" href="/admin/roles/{{$role->id}}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection