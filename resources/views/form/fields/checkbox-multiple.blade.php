<div class="form-group">
    <label class="control-label">{{ __($title) }}</label>
    @foreach ($data as $d)
        <div>
            <label>
                {{ Form::checkbox($id.'[]', $d, in_array($d, $values), ['class' => 'checkbox']) }}
                <span>{{$d}}</span>
            </label>
        </div>
    @endforeach
</div>