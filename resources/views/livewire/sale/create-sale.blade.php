
<form wire:submit="save" style="padding: 2% 5%">

    <div class="mb-3">
        <label for="output" class="form-label">Salida</label>
        <select wire:model.live="selectedOutput" class="form-select" id= "output" required>
            <option value="">== Opciones ==</option>
            @foreach ($products as $product)
                <option value="{{$product->name}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>

    <label for="quantitysale" class="form-label">Cantidad a vender</label>
    <div class = "input-group mb-3" >
        <input type="number" wire:model.live="quantity" class= "form-control" id= "quantitysale" required>
        <span class="input-group-text">
            <label for="cantidad" class="form-label" style="margin-top: 2%">Cantidad que posees</label>
            <input type="text" class="form-control" wire:model="quantityOrigin" id="cantidad" style="width: 50px" readonly>
        </span>
    </div>


    <label for="priceval" class="form-label">Precio</label>
    <div class="input-group mb-3">
        <span class="input-group-text">
            <select wire:model.live="selectedMoney" class="form-select">
                <option value="1">C$</option>
                <option value="2">$</option>
            </select>
        </span>
        <input type="number" wire:model.live="priceval" class="form-control" id="priceval" readonly>
        <span class="input-group-text">Cambio de dolar a 36.57</span>
    </div>

    <div class= "mb-3">
        <label for="datesale">Fecha en la que se realizo</label>
        <input type="date" wire:model.live="date" class="form-control" id="datesale" required>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>

</form>
