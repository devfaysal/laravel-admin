<div class="form-group @error($name) has-error @enderror">
    @props(['name' => '', 'id' => $name, 'value' => '', 'label' => null, 'tooltip', 'data' => [] ])

    @if($label)
        <label for="{{ $id }}" class="control-label">{{ __($label) }}</label>
    @endif
    
    @if(isset($tooltip))
        <x-tooltip :title="$tooltip"/>
    @endif

    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? ' is-invalid':'')]) }}>
        <option value="">Select {{ __($label) }}</option>
        @if($attributes->has('wire:model'))
        {!! prepare_options($data, old($name, $value), $attributes->get('wire:model')) !!}
        @else
        {!! prepare_options($data, old($name, $value)) !!}
        @endif
    </select>
    
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>