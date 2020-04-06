<div class="form-group">
    @php
        $attributes['class'] = 'custom-control-input' .($errors->has($name) ? ' is-invalid':'');
    @endphp
    <label class="control-label mb-1">{{ __($label) }}</label>
    
    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif

    @foreach ($data as $d)
    @php
        $attributes['id'] = $d;
    @endphp
        <div class="custom-control custom-radio">
            <input type="radio" id="{{ $d }}" name="{{ $name }}" {{$d == old($name, $value) ? 'checked' : ''}} value="{{ $d }}" {!! prepare_attributes($attributes) !!}>
            <label class="custom-control-label" for="{{$d}}">{{$d}}</label>
        </div>
    @endforeach
</div>
