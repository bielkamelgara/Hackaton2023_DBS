

<form wire:submit="save" style="padding: 2% 5%">

    <div class="inv-pro">
        <div class="inv-container1">
            <div class="inv-container">
                <label for="sectorname" >Sectores</label>

                   <select wire:model.live="selectedSector" class="input" style="margin-left: 35px" id="selectedSector">
                        <option value="">Elija el sector</option>     {{--OPCIONES PARA ESCOGER--}}
                        @foreach ( $sectores as $sector )
                             <option value="{{$sector->id}}">{{$sector->name}}</option>



                    @endforeach
                </select>
            </div>

            @if(!is_null($name))
            <div class="inv-container">
                <label for="categoria">Categoria</label>
                <select wire:model.live="selectedCategory" class="input" id="categoria">
                    <option value="">Categoría</option>
                    @foreach ($name as $category)
                        <option value="{{$category->id}}">{{$category->name_category}}</option>
                    @endforeach
                </select>
            </div>
            @endif
        </div>

    </div>
</form>


