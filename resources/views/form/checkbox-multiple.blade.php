<div class="form-group">
    @php
        $attributes['class'] = 'checkbox' .($errors->has($name) ? ' is-invalid':'');
        $id = isset($id) ? $id : $name;
    @endphp
    <label class="control-label">{{ __($label) }}</label>

    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif
    
    @foreach ($data as $d)
        <div>
            <label>
                <input type="checkbox" id="{{ $d }}" name="{{ $name.'[]' }}" {{ in_array($d, old($name, $values)) ? 'checked' : ''}} value="{{ $d }}" {!! prepare_attributes($attributes) !!}>
                <span>{{$d}}</span>
            </label>
        </div>
    @endforeach
</div>