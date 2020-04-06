@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="/admin/example">
        @csrf
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">All form fields</h4>
                        </div>
                        <x-text-field name="text" label="Text Field" tooltip="Tooltip" placeholder="lorem"/>
                        <x-textarea-field name="textarea" label="Textarea Field"/>
                        <x-select-field name="select" label="Select Field"/>
                        <x-password-field name="password" label="Password Field"/>
                        <x-number-field name="number" label="Number Field" min="0"/>
                        <x-hidden-field name="hidden"/>
                        <x-file-field name="file" label="File Field"/>
                        <x-email-field name="email" label="Email Field"/>
                        <x-date-field name="date" label="Date Field"/>
                        <x-checkbox-field name="checkbox" label="Checkbox Field" value=""/>

                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Create">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection