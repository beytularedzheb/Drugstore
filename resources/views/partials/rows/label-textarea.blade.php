<div class="form-group {{ $errors->has($fieldname) ? 'has-error' : '' }}">
    {!! Form::label($fieldname, trans($label_key), ['class' => 'control-label']) !!}
    {!! Form::textarea($fieldname, null, ['class'=>'form-control']) !!}
    @if ($errors->has($fieldname)) <p class="text-danger">{{ $errors->first($fieldname) }}</p> @endif
</div>