@php
    $attributes = [];
@endphp

<input type="hidden" id="{{ $id }}" name="{{ $id }}" value="{{ old($id, $value) }}" {!! prepare_attributes($attributes) !!}>