<div class="form-group {{ $errors->has($fieldname) ? 'has-error' : '' }}">
    {!! Form::label($fieldname, $label, ['class' => 'control-label']) !!}
    {!! Form::text($fieldname, null, ['class'=>'form-control']) !!}
    @if ($errors->has($fieldname)) <p class="text-danger">{{ $errors->first($fieldname) }}</p> @endif
</div>