<div class="form-group">
    @php
        $attributes['class'] = 'checkbox' .($errors->has($id) ? ' is-invalid':'');
    @endphp
    <label class="control-label">{{ __($title) }}</label>

    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif
    
    @foreach ($data as $d)
        <div>
            <label>
                <input type="checkbox" id="{{ $d }}" name="{{ $id.'[]' }}" {{ in_array($d, $values) ? 'checked' : ''}} value="{{ $d }}" {!! prepare_attributes($attributes) !!}>
                <span>{{$d}}</span>
            </label>
        </div>
    @endforeach
</div>