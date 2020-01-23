@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Roles </h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="{{route('roles.create')}}">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table id="roles-table" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
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
    $('#roles-table').DataTable({
        order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{{route('roles.datatable')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'permissions', name: 'permissions'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
    });
</script>
@endsection