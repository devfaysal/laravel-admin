<div class="form-group">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label' => null, 'tooltip', 'data' => [] ])

    @if($label)
        <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    @endif
    
    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif

    @foreach ($data as $v => $label)
        <div class="custom-control custom-radio">
            <input type="radio" id="{{ $v }}" name="{{ $name }}" {{$v == old($name, $value) ? 'checked' : ''}} value="{{ $v }}" {{ $attributes->merge(['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid':'')]) }}>
            <label class="custom-control-label" for="{{ $v }}">{{ $label }}</label>
        </div>
    @endforeach
</div>
