<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('payment') }}
            {{ Form::text('payment', $membership->payment, ['class' => 'form-control' . ($errors->has('payment') ? ' is-invalid' : ''), 'placeholder' => 'Payment']) }}
            {!! $errors->first('payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ccn') }}
            {{ Form::text('ccn', $membership->ccn, ['class' => 'form-control' . ($errors->has('ccn') ? ' is-invalid' : ''), 'placeholder' => 'Ccn']) }}
            {!! $errors->first('ccn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
          <div class="form-group"> 
            {{ Form::label('duration') }}
            {{ Form::text('duration', $membership->duration, ['class' => 'form-control' . ($errors->has('duration') ? ' is-invalid' : ''), 'placeholder' => 'Duration']) }}
            {!! $errors->first('duration', '<div class="invalid-feedback">:message</div>') !!}
        </div>  

        <div class="form-group">
            {{ Form::label('id_pay') }}
            {{ Form::text('id_pay', $membership->id_pay, ['class' => 'form-control' . ($errors->has('id_pay') ? ' is-invalid' : ''), 'placeholder' => 'Id Pay']) }}
            {!! $errors->first('id_pay', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
         <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $membership->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
