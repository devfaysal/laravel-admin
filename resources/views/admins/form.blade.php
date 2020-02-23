
@include('laravel-admin::form.text', [
    'name' => 'name',
    'label' => 'Name',
    'value' => $admin->name
])

@include('laravel-admin::form.email', [
    'name' => 'email',
    'label' => 'Email',
    'value' => $admin->email
])

@include('laravel-admin::form.password', [
    'name' => 'password',
    'label' => 'Password',
])