@extends('admin.layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Users</h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="/admin/users/create">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    <span class="badge badge-success">{{$role->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($user->trashed())
                                                    <a class="btn btn-sm btn-oval btn-warning" href="/admin/users/{{$user->id}}/restore">Restore</a>
                                                @else
                                                    <a class="btn btn-sm btn-oval btn-info" href="/admin/users/{{$user->id}}/edit">Edit</a>
                                                    <a class="btn btn-sm btn-oval btn-primary" href="/admin/users/{{$user->id}}">Show</a>
                                                @endif
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