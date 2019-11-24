<div class="form-group">
    <label class="control-label">{{ __($title) }}</label>
    @foreach ($values as $value)
        <div>
            <label>
                {{ Form::checkbox($id.'[]', $value, false, ['class' => 'checkbox']) }}
                <span>{{$value}}</span>
            </label>
        </div>
    @endforeach
</div>