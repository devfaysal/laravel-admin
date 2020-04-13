@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <form method="POST" action="{{ route('admins.updatePassword') }}">
        @csrf
        @method('PATCH')
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="card sameheight-item" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title">Change Password</h4>
                        </div>
                        <x-password-field name="old_password" label="Old Password"/>
                        <x-password-field name="new_password" label="New Password"/>
                        <x-password-field name="new_password_confirmation" label="Confirm New Password"/>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection