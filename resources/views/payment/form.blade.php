<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Número de tarjeta') }}
            {{ Form::text('ccn', $payment->ccn, ['class' => 'form-control' . ($errors->has('ccn') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('ccn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::text('date', $payment->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="=form-group">
            {{form::label('Contraseña')}}
            {{form::text('password', $payment->password, ['class'=>'form-control' . ($errors->has('password') ? 'is-invalid': ''), 'placeholder' => '']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>