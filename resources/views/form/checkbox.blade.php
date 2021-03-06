<div class="form-group">
    @php
        $attributes['class'] = 'custom-control-input' .($errors->has($name) ? ' is-invalid':'');
        $id = isset($id) ? $id : $name;
        $attributes['id'] = $id;
    @endphp
    <label class="control-label">{{ __($label) }}</label>

    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif
    
    <div class="custom-control custom-checkbox">
        <input type="checkbox" id="{{ $id }}" name="{{ $name }}" {{$data == old($name, $value) ? 'checked' : ''}} {!! prepare_attributes($attributes) !!}>
        <label class="custom-control-label" for="{{$id}}">{{ __($data) }}</label>
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>