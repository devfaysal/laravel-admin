
@include('laravel-admin::form.fields.text', [
    'id' => 'name',
    'title' => 'Name',
    'value' => $user->name
])

@include('laravel-admin::form.fields.email', [
    'id' => 'email',
    'title' => 'Email',
    'value' => $user->email
])

@include('laravel-admin::form.fields.password', [
    'id' => 'password',
    'title' => 'Password',
])