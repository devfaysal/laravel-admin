<div class="form-group @error($name) has-error @enderror">
    @props(['name' => '', 'id' => $name, 'values' => [], 'label' => null, 'tooltip', 'data' => [] ])

    @if($label)
        <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    @endif
    
    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif

    <select id="{{ $id }}" name="{{ $name . '[]' }}" {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? ' is-invalid':'')]) }} multiple="multiple">
        {!! prepare_options($data, old($name, $values)) !!}
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>