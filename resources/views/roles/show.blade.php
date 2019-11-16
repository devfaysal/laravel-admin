@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> {{$role->name}}</h4>
                        <a class="btn btn-sm btn-oval btn-info mx-1 ml-auto" href="/admin/roles/{{$role->id}}/edit"> Edit</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table class="table">
                                <tr>
                                    <th width="100px">Name</th>
                                    <td width="10px">:</td>
                                    <td>{{$role->name ?? 'N/A'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="title-block d-flex">
                        <a class="btn btn-sm btn-oval btn-danger mx-1 ml-auto" href="/admin/roles/{{$role->id}}/edit"> Delete</a>
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
                            @foreach ($role->permissions as $permission)
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