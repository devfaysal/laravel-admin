<div class="form-group">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label', 'tooltip'])

    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif
    
    <div class="custom-control custom-checkbox">
        <input 
            type="checkbox" 
            id="{{ $id }}" 
            name="{{ $name }}"
            {{empty(old($name, $value)) ? '' : 'checked'}} 
            {{ $attributes->merge(['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid':'')]) }} 
        >
        <label class="custom-control-label" for="{{$id}}">{{ __($label) }}</label>

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>