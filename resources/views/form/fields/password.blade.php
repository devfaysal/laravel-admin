<div class="form-group @error($id) has-error @enderror">
    @php
        $attributes['class'] = 'form-control' .($errors->has($id) ? ' is-invalid':'');
    @endphp
    <label for="{{ $id }}" class="control-label">{{ __($title) }}</label>
    <input type="password" id="{{ $id }}" name="{{ $id }}" {!! prepare_attributes($attributes) !!}>
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>