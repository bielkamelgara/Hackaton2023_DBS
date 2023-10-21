@extends('layouts.admin')

@section('template_title')
    Producto
@endsection

@section('content')

<div class="container-fluid" style="margin-top: 1%">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex¿; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('') }}
                        </span>

                        <div class="float-right">
                            <button type="button" class="btn btn-primary btn-sm float-right"  data-placement="left" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{ __('Agregar producto') }}
                            </button>
                        </div>
                    </div>
                </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="animal">
                                <thead class="thead">
                                    <tr>
										<th>Salida</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Fecha de salida</th>

                                        <th>==Acciones==</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
											<td>{{ $sale->output }}</td>
											<td>{{ $sale->quantity }}</td>
											<td>{{ $sale->price }}</td>
											<td>{{ date('Y-M-d',strtotime($sale->date)) }}</td>

                                            <td>
                                                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                                    <button type="button" class="btn btn-sm btn-primary btnshow" value={{$product->id}}><i class="fa fa-fw fa-eye"></i></button>
                                                    <button type="button" class="btn btn-sm btn-success btnedit" value= {{$product->id}}><i class="fa fa-fw fa-edit"></i></button>
                                                    @csrf

                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm bg-pink-700"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            @livewire('product.create-product')
                        </div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('product/update')}}" method="POST" style="padding: 2% 5%">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="pro-id" id="pro-id">
                        <input type="hidden" name="quanty" id="quanty">

                        <div class="modal-body">
                            <div class="box-body row">
                                <div class="form-group mt-3 mb-3">
                                    <label for="name-product1" class="form-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" name="name-product1" id="name-product1" required>
                                </div>


                                <div class="form-group  mt-3 mb-3">
                                    <label for="des-product1" class="form-label">Descripcion</label>
                                    <textarea name="des-product1" id="des-product1" cols="30" rows="5" class="form-control" required></textarea>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="price-product1" class="form-label">Precio</label>
                                    <input type="number" class="form-control" name="price-product1" id="price-product1" required>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="tall-product1">Talla</label>
                                    <input type="text" class="form-control" name="tall-product1" id="tall-product1" required>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="color-product1" class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color-product1" id="color-product1" required>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="avilable-product1">Disponibilidad</label>
                                    <select name="avilable-product1" id="avilable-product1" class="form-select" required>
                                        <option value="">==Opciones==</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="No Disponible">No Disponible</option>
                                    </select>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="ammount-product1">Cantidad</label>
                                    <input type="number" name="amount-product1" id="amount-product1" class="form-control" required>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="status-product1">Estado</label>
                                    <select name="status-product1" id="status-product1" class="form-select" required>
                                        <option value="">==Opciones==</option>
                                        <option value="Usado">Usado</option>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="SemiNuevo">SemiNuevo</option>
                                    </select>
                                </div>


                                <div class="form-group mt-3 mb-3">
                                    <label for="sector-product1">Sector</label>
                                    <select name="sector-product1" id="sector-product1" class="form-select" required>
                                        <option value="">==Opciones==</option>
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
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="showproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <div class="box-body row">
                                        <div class="form-group mt-3 mb-3">
                                            <label for="name-product2" class="form-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" name="name-product2" id="name-product2" required readonly>
                                        </div>


                                        <div class="form-group  mt-3 mb-3">
                                            <label for="des-product2" class="form-label">Descripcion</label>
                                            <textarea name="des-product2" id="des-product2" cols="30" rows="5" class="form-control" required readonly></textarea>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="price-product2" class="form-label">Precio</label>
                                            <input type="text" class="form-control" name="price-product2" id="price-product2" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="tall-product2">Talla</label>
                                            <input type="text" class="form-control" name="tall-product2" id="tall-product2" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="color-product2" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color-product2" id="color-product2" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="avilable-product2">Disponibilidad</label>
                                            <input type="text" name="avilable-product2" id="avilable-product2" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="ammount-product2">Cantidad</label>
                                            <input type="text" name="amount-product2" id="amount-product2" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="status-product2">Estado</label>
                                            <input type="text" name="status-product2" id="status-product2" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="sector-product2">Sector</label>
                                            <input type="text" name="sector-product2" id="sector-product2" class="form-control" required readonly>
                                        </div>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<script>
    // Agrega un event listener a todos los elementos con la clase "editbtn"
    document.querySelectorAll('.btnedit').forEach(function(button) {
        button.addEventListener('click', function() {
            // Acción que deseas realizar al hacer clic en el botón
            var product_id = $(this).val();
            $('#editproduct').modal('show');

            $.ajax({
                type: "GET",
                url: "/product/edit/"+product_id,
                success:function (response){
                    $('#name-product1').val(response.product.name);
                    $('#des-product1').val(response.product.description);
                    $('#price-product1').val(response.product.price);
                    $('#tall-product1').val(response.product.size);
                    $('#color-product1').val(response.product.color);
                    $('#avilable-product1').val(response.product.avilable);
                    $('#amount-product1').val(response.product.ammount);
                    $('#status-product1').val(response.product.status);
                    $('#sector-product1').val(response.product.id_sector);
                    $('#pro-id').val(product_id)
                    $('#quanty').val(response.product.ammount);
                }
            });
        });
    });

    // Agrega un event listener a todos los elementos con la clase "editbtn"
    document.querySelectorAll('.btnshow').forEach(function(button) {
        button.addEventListener('click', function() {
            // Acción que deseas realizar al hacer clic en el botón
            var product_id = $(this).val();
            $('#showproduct').modal('show');

            $.ajax({
                type: "GET",
                url: "/product/show/"+product_id,
                success:function (response){
                    $('#name-product2').val(response.product.name);
                    $('#des-product2').val(response.product.description);
                    $('#price-product2').val(response.product.price);
                    $('#tall-product2').val(response.product.size);
                    $('#color-product2').val(response.product.color);
                    $('#avilable-product2').val(response.product.avilable);
                    $('#amount-product2').val(response.product.ammount);
                    $('#status-product2').val(response.product.status);
                    $('#sector-product2').val(response.sector.name);
                }
            });
        });
    });
</script>



@endsection
