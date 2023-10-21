@extends('layouts.admin')

@section('template_title')
    Entradas
@endsection

@section('content')
<div class="container-fluid" style="margin-top: 1%">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id= "animal">
                                <thead>
                                    <tr>
                                        <th>Nombre de la Entrada</th>
                                        <th>Description</th>
                                        <th>Fecha de creacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entrances as $entrance)
                                    <tr>
                                        <td>{{$entrance->input}}</td>
                                        <td>{{$entrance->description}}</td>
                                        <td>{{date('Y-M-d',strtotime($entrance->date_create))}}</td>

                                        <td>
                                            <form>
                                                <button type="button" value="{{$entrance->id}}" class="btn btn-sm btn-primary showbtn">Ver</a>
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

<div class="modal fade" id="show-product2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Animal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form style="padding: 2% 5%">
                            @csrf
                            <div class="modal-body">
                                <div class="box-body row">
                                        <div class="form-group mt-3 mb-3">
                                            <label for="name-product3" class="form-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" name="name-product3" id="name-product3" required readonly>
                                        </div>


                                        <div class="form-group  mt-3 mb-3">
                                            <label for="des-product3" class="form-label">Descripcion</label>
                                            <textarea name="des-product3" id="des-product3" cols="30" rows="5" class="form-control" required readonly></textarea>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="price-product3" class="form-label">Precio</label>
                                            <input type="text" class="form-control" name="price-product3" id="price-product3" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="tall-product3">Talla</label>
                                            <input type="text" class="form-control" name="tall-product3" id="tall-product3" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="color-product3" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color-product3" id="color-product3" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="avilable-product3">Disponibilidad</label>
                                            <input type="text" name="avilable-product3" id="avilable-product3" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="ammount-product3">Cantidad</label>
                                            <input type="text" name="amount-product3" id="amount-product3" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="status-product3">Estado</label>
                                            <input type="text" name="status-product3" id="status-product3" class="form-control" required readonly>
                                        </div>


                                        <div class="form-group mt-3 mb-3">
                                            <label for="sector-product3">Sector</label>
                                            <input type="text" name="sector-product3" id="sector-product3" class="form-control" required readonly>
                                        </div>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<script>

        // Agrega un event listener a todos los elementos con la clase "editbtn"
        document.querySelectorAll('.showbtn').forEach(function(button) {
            button.addEventListener('click', function() {
                // Acción que deseas realizar al hacer clic en el botón
                var val = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "entrances/data/"+val,
                    success:function (response){
                        if(response.entrance.description == 'Entrada de Producto'){
                            $('#show-product2').modal('show');
                            $.ajax({
                                type: "GET",
                                url: "entrances/showproduct/"+val,
                                success:function(response){
                                    $('#name-product3').val(response.product.name);
                                    $('#des-product3').val(response.product.description);
                                    $('#price-product3').val(response.product.price);
                                    $('#tall-product3').val(response.product.size);
                                    $('#color-product3').val(response.product.color);
                                    $('#avilable-product3').val(response.product.avilable);
                                    $('#amount-product3').val(response.product.ammount);
                                    $('#status-product3').val(response.product.status);
                                    $('#sector-product3').val(response.sector.name);
                                }
                            });
                        }
                    }
                });
            });
        });
  </script>

@endsection
