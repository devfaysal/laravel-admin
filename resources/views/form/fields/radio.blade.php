<div class="form-group">
    @php
        $attributes['class'] = 'custom-control-input' .($errors->has($id) ? ' is-invalid':'');
    @endphp
    <label class="control-label mb-1">{{ __($title) }}</label>
    @foreach ($data as $d)
    @php
        $attributes['id'] = $d;
    @endphp
        <div class="custom-control custom-radio">
            <input type="radio" id="{{ $d }}" name="{{ $id }}" {{$d == $value ? 'checked' : ''}} value="{{ $d }}" {!! prepare_attributes($attributes) !!}>
            <label class="custom-control-label" for="{{$d}}">{{$d}}</label>
        </div>
    @endforeach
</div>
