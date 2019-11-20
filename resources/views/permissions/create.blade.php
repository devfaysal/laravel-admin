@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    {!! Form::open(['url' => '/admin/permissions', 'method' => 'POST']) !!}
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Create New Permission</h4>
                        </div>
                        @include('laravel-admin::form.fields.text', [
                            'id' => 'name',
                            'title' => 'Permission Name'
                        ])
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</section>
@endsection