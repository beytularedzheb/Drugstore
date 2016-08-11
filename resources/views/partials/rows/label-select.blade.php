<div class="form-group {{ $errors->has($fieldname) ? 'has-error' : '' }}">
    {!! Form::label($fieldname, $label, ['class' => 'control-label']) !!}
    {!! Form::select($fieldname, $select_items, isset($selected) ? $selected : null, ['class'=>'form-control', 'selected']) !!}
    @if ($errors->has($fieldname)) <p class="text-danger">{{ $errors->first($fieldname) }}</p> @endif
</div>