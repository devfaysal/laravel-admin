<div class="form-group @error($id) has-error @enderror">
    {{ Form::label( $id, $title, ['class' => 'control-label']) }}
    {{ Form::text( $id, null, ['class' => 'form-control' .($errors->has($id) ? ' is-invalid':'')] ) }}
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>