
@include('laravel-admin::form.fields.text', [
    'name' => 'name',
    'label' => 'Name',
    'value' => $user->name
])

@include('laravel-admin::form.fields.email', [
    'name' => 'email',
    'label' => 'Email',
    'value' => $user->email
])

@include('laravel-admin::form.fields.password', [
    'name' => 'password',
    'label' => 'Password',
])