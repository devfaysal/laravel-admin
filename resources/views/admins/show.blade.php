@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> {{$admin->name}}</h4>
                        <a class="btn btn-sm btn-oval btn-info mx-1 ml-auto" href="/admin/admins/{{$admin->id}}/edit"> Edit</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table class="table">
                                <tr>
                                    <th width="100px">Name</th>
                                    <td width="10px">:</td>
                                    <td>{{$admin->name ?? 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{$admin->email ?? 'N/A'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="title-block d-flex">
                        <form class="mx-1 ml-auto" method="POST" action="/admin/admins/{{$admin->id}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-oval btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title">Roles</h4>

                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12 mb-3">
                            @foreach ($admin->roles as $role)
                                <span class="badge badge-success">{{$role->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title">Permission</h4>

                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12 mb-3">
                            @foreach ($admin->permissions as $permission)
                                <span class="badge badge-success">{{$permission->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection