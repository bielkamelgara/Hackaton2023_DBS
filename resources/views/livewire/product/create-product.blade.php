<form wire:submit="save" style="padding: 2% 5%">
    <div class="box-body row">
        <div class="form-group mt-3 mb-3">
            <label for="name-product" class="form-label">Nombre del Producto</label>
            <input wire:model.live="name" type="text" class="form-control" name="name-product" id="name-product">
        </div>


        <div class="form-group  mt-3 mb-3">
            <label for="des-product" class="form-label">Descripcion</label>
            <textarea wire:model.live="description" name="des-product" id="des-product" cols="30" rows="5" class="form-control"></textarea>
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="price-product" class="form-label">Precio</label>
            <input wire:model.live="price" type="number" min="1" class="form-control" name="price-product" id="price-product">
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="tall-product">Talla</label>
            <input wire:model.live="tall" type="text" class="form-control" name="tall-product" id="tall-product">
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="color-product" class="form-label">Color</label>
            <input wire:model.live="color" type="text" class="form-control" name="color-product" id="color-product">
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="avilable-product">Disponibilidad</label>
            <select wire:model.live="selectedAvilable" name="avilable-product" id="avilable-product" class="form-select">
                <option value="">Opciones</option>
                <option value="Disponible">Disponible</option>
                <option value="No Disponible">No Disponible</option>
            </select>
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="ammount-product">Cantidad</label>
            <input wire:model.live="amount" type="number" min="1" name="ammount-product" id="ammount-product" class="form-control">
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="formFile" class="form-label">Imagen del producto</label>
            <input wire:model.live="photo" class="form-control" type="file" id="formFile">
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="status-product">Estado</label>
            <select wire:model.live="selectedStatus" name="status-product" id="status-product" class="form-select">
                <option value="">Opciones</option>
                <option value="Usado">Usado</option>
                <option value="Nuevo">Nuevo</option>
                <option value="SemiNuevo">Semi nuevo</option>
            </select>
        </div>


        <div class="form-group mt-3 mb-3">
            <label for="sector-product">Sector</label>
            <select wire:model.live="selectedSector" name="sector-product" id="sector-product" class="form-select">
                <option value="">Opciones</option>
                @foreach ($sectors as $sector)
                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
        </div>
    </div>
</form>
