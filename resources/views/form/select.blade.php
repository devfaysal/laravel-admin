<div class="form-group @error($name) has-error @enderror">
    @php
        $attributes['class'] = 'form-control' .($errors->has($name) ? ' is-invalid':'');
        $attributes['placeholder'] = 'Select ' .  __($label);
        $id = isset($id) ? $id : $name;
    @endphp
    <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    
    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif

    <select id="{{ $id }}" name="{{ $name }}" {!! prepare_attributes($attributes) !!}>
        <option value="">Select {{ __($label) }}</option>
        {!! prepare_options($data, old($name, $value)) !!}
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>