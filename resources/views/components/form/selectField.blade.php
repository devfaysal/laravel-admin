<div class="form-group @error($name) has-error @enderror">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label', 'tooltip', 'data' => [] ])

    <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    
    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif

    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? ' is-invalid':'')]) }}>
        <option value="">Select {{ __($label) }}</option>
        {!! prepare_options($data, old($name, $value)) !!}
    </select>
    
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>