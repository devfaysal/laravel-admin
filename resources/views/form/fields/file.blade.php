<div class="form-group @error($id) has-error @enderror">
    @php
        $attributes['class'] = 'form-control-file' .($errors->has($id) ? ' is-invalid':'');
    @endphp
    {{ Form::label( $id, __($title), ['class' => 'control-label']) }}
    {{ Form::file( $id, $attributes) }}
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>