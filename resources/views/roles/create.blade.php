@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="/admin/roles">
        @csrf
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Create New Role <x-tooltip title="lorem dsdsd"/></h4>
                        </div>

                        <x-text-field name="name" label="Role Name" required/>
                        <x-text-field name="guard_name" label="Guard Name" />
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <x-checkbox-multiple name="permissions" label="Permissions" :data="$permissions" :values="[]"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection