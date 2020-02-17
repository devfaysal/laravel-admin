
@include('laravel-admin::form.text', [
    'name' => 'name',
    'label' => 'Name',
    'value' => $user->name
])

@include('laravel-admin::form.email', [
    'name' => 'email',
    'label' => 'Email',
    'value' => $user->email
])

@include('laravel-admin::form.password', [
    'name' => 'password',
    'label' => 'Password',
])