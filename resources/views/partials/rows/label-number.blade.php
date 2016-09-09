<div class="form-group {{ $errors->has($fieldname) ? 'has-error' : '' }}">
    {!! Form::label($fieldname, $label, ['class' => 'control-label']) !!}
    {!! Form::number($fieldname, null, ['class'=>'form-control', 'step'=>'0.1']) !!}
    @if ($errors->has($fieldname)) <p class="text-danger">{{ $errors->first($fieldname) }}</p> @endif
</div>