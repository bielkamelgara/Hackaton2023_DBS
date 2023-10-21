<div class="box box-info padding-1 container">


    <div class="box-body row">
        <div class="form-group mt-3 col-3">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group  mt-3 col-3">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mt-3 col-3">
            {{ Form::label('Precio') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mt-3 col-3">
            {{ Form::label('Talla') }}
            {{ Form::text('size', $product->size, ['class' => 'form-control' . ($errors->has('size') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('size', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3 col-3">
            {{ Form::label('Color') }}
            {{ Form::text('color', $product->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3">
            {{ Form::label('Disponibilidad') }}
            {{ Form::text('avilable', $product->avilable, ['class' => 'form-control' . ($errors->has('avilable') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('avilable', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3">
            {{ Form::label('Cantidad') }}
            {{ Form::text('ammount', $product->ammount, ['class' => 'form-control' . ($errors->has('ammount') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('ammount', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3">
            {{ Form::label('Imágenes') }}
            {{ Form::file('photo', $product->imgProduct, ['class' => 'form-control' . ($errors->has('photo') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}

            {{-- }} <label for="imgProduct">Imágenes</label>
            <input type="file" name="imgProduct" class="form-control" id="imgProduct"> --}}
        </div>

        <div class="form-group mt-3">
            {{ Form::label('Estado') }}
            {{ Form::text('status', $product->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3">
            {{ Form::label('Emprendedor') }}
            {{ Form::text('id_user', $product->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group mt-3 ">
            {{ Form::label('Sector') }}
            {{ Form::text('id_sector', $product->id_sector, ['class' => 'form-control' . ($errors->has('id_sector') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('id_sector', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
