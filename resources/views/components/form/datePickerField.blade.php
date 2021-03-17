<div class="form-group @error($name) has-error @enderror">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label' => $label, 'tooltip'])

    @if($label)
        <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    @endif

    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'form-control datepicker' . ($errors->has($name) ? ' is-invalid':'')]) }}>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>