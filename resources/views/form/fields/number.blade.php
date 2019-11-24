<div class="form-group @error($id) has-error @enderror">
    {{ Form::label( $id, __($title), ['class' => 'control-label']) }}
    {{ Form::number( $id, $value, ['class' => 'form-control' .($errors->has($id) ? ' is-invalid':'')] ) }}
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>