<div class="form-group">
    @props(['name' => '', 'id' => $name, 'value' => '', 'values' => [], 'data' => [], 'label' => null, 'tooltip'])
    
    @if($label)
        <label class="control-label">{{ __($label) }}</label>
    @endif

    @if(isset($tooltip))
        <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $tooltip }}"></span>
    @endif
    
    @foreach ($data as $d)
        <div>
            <label>
                <input type="checkbox" id="{{ $d }}" name="{{ $name.'[]' }}" {{ in_array($d, old($name, $values)) ? 'checked' : ''}} value="{{ $d }}" {{$attributes->merge(['class' => 'checkbox custom-control-input ' . ($errors->has($name) ? ' is-invalid':'')])}}>
                <span>{{$d}}</span>
            </label>
        </div>
    @endforeach
</div>