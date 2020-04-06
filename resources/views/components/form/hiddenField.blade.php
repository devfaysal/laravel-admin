@props(['name' => '', 'id' => $name, 'value' => ''])

<input 
    type="hidden" 
    id="{{ $id }}" 
    name="{{ $name }}" 
    value="{{ old($id, $value) }}" 
    {{ $attributes }} 
>