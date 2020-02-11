<div class="form-group">
    @php
        $attributes['class'] = 'custom-control-input' .($errors->has($id) ? ' is-invalid':'');
        $attributes['id'] = $id;
    @endphp
    <label class="control-label">{{ __($title) }}</label>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" id="{{ $id }}" name="{{ $id }}" {{$data == $value ? 'checked' : ''}} {!! prepare_attributes($attributes) !!}>
        <label class="custom-control-label" for="{{$id}}">{{ __($data) }}</label>
        @error($id)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>