@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Admins</h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="{{route('admins.create')}}">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table id="admins-table" class="table table-hover" style="width:100%" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="hide">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Last Login</th>
                                        <th>IP</th>
                                        <th class="hide">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
    $('#admins-table').DataTable({
        order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{{route('admins.datatable')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles'},
            {data: 'last_login_at', name: 'last_login_at'},
            {data: 'last_login_ip', name: 'last_login_ip'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
    });
</script>
@endsection