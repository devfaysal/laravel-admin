<div class="form-group @error($id) has-error @enderror">
    @php
        $attributes['class'] = 'form-control' .($errors->has($id) ? ' is-invalid':'');
    @endphp
    <label for="{{ $id }}" class="control-label">{{ __($title) }}</label>

    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif
    
    <input type="email" id="{{ $id }}" name="{{ $id }}" value="{{ old($id, $value) }}" {!! prepare_attributes($attributes) !!}>
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>