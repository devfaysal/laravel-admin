@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="/admin/admins">
        @csrf
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Create New admin</h4>
                        </div>
                        @include('laravel-admin::admins.form', [
                            'admin' => new Devfaysal\LaravelAdmin\Models\Admin(),
                            'buttonText' => 'Create'
                        ])
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <x-checkbox-multiple name="roles" label="Roles" :data="$roles" :values="[]"/>
                        <x-checkbox-multiple name="permissions" label="Permissions" :data="$permissions" :values="[]"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection