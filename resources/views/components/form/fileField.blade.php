<div class="form-group @error($name) has-error @enderror">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label', 'tooltip'])

    <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>

    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif
    
    <input 
        type="file" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'form-control-file ' . ($errors->has($name) ? ' is-invalid':'')]) }} 
    >

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>