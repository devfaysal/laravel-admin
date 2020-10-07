@props(['count' => 100, 'label' => 'Some Label', 'icon' => 'fa fa-sitemap'])
<div class="col-12 col-sm-3 stat-col">
    <div class="custom-box">
        <div class="stat-icon">
            <i class="{{ $icon }}"></i>
        </div>
        <div class="stat">
            <div class="value"> {{ $count }} </div>
            <div class="name"> {{ $label }} </div>
        </div>
    </div>
</div>
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/dashboard.css') }}"/>
    @endpush
@endonce