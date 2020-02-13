@php
    $attributes = [];
    $id = isset($id) ? $id : $name;
@endphp

<input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ old($id, $value) }}" {!! prepare_attributes($attributes) !!}>