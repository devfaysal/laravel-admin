@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row sameheight-container">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Users</h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="{{route('users.create')}}">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table id="users-table" class="table table-hover" style="width:100%" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="hide">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th class="hide">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="hide">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th class="hide">Action</th>
                                    </tr>
                                </tfoot>
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
    $('#users-table').DataTable({
        order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{{route('users.datatable')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                .on('keyup change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
            $('.hide input').hide();
        }
    });
</script>
@endsection