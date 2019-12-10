<div class="form-group @error($id) has-error @enderror">
    @php
        $attributes['class'] = 'form-control' .($errors->has($id) ? ' is-invalid':'');
        $attributes['placeholder'] = 'Select ' .  __($title);
    @endphp
    {{ Form::label( $id, __($title), ['class' => 'control-label']) }}
    {{ Form::select($id, $data, $value, $attributes ) }}
    @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>