@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title"> Permissions </h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="/admin/permissions/create">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table id="permissions-table" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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
    $('#permissions-table').DataTable({
        order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{{route('permissions.datatable')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'}
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