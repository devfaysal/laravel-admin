<div class="form-group @error($id) has-error @enderror">
    @php
        $attributes['class'] = 'form-control' .($errors->has($id) ? ' is-invalid':'');
        $attributes['placeholder'] = 'Select ' .  __($title);
    @endphp
    <label for="{{ $id }}" class="control-label">{{ __($title) }}</label>
    
    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif

    <select id="{{ $id }}" name="{{ $id }}" {!! prepare_attributes($attributes) !!}>
        <option value="">Select {{ __($title) }}</option>
        {!! prepare_options($data, $value) !!}
    </select>
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>