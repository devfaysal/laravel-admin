<div class="form-group @error($name) has-error @enderror">
    @php
        $attributes['class'] = 'form-control datepicker' .($errors->has($name) ? ' is-invalid':'');
        $id = isset($id) ? $id : $name;
    @endphp
    <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    
    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif

    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}" {!! prepare_attributes($attributes) !!}>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>