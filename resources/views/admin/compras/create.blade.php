@extends('adminlte::page')

@section('content_header')
    <h1> <b>Compras/Registro de una nueva Compra</b> </h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body"> 
                    <form action="{{url('/admin/compras/create')}}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label> <b>*</b>
                                            <input type="number" style="text-align: center;background-color:antiquewhite " class="form-control" id="cantidad" value="1" name="cantidad" required >
                                            @error('cantidad')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Codigo</label> <b>*</b>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input id="codigo" type="text" class="form-control" placeholder="Codigo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div style="height: 32px"></div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-search"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="exampleModalLabel">Listado de productos</h1>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="mitabla"  class="table table-striped table-bordered table-hover table-sm table-responsive" >
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" style="text-align: center">Nro</th>
                                                                <th scope="col" style="text-align: center">Accion</th>
                                                                <th scope="col" style="text-align: center">Categoria</th>
                                                                <th scope="col" style="text-align: center">Codigo</th>
                                                                <th scope="col" style="text-align: center">Nombre</th>
                                                                <th scope="col" style="text-align: center">Descripcion</th>
                                                                <th scope="col" style="text-align: center">stock</th>
                                                                <th scope="col" style="text-align: center">Precio de Compra</th>
                                                                <th scope="col" style="text-align: center">Precio de Venta</th>
                                                                <th scope="col" style="text-align: center">Imagen</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $contador = 1; ?>
                                                        @foreach($productos as $producto)
                                                            <tr>
                                                                <td style="text-align:center;vertical-align: middle">{{$contador++}}</td>
                                                                <td style="text-align:center;vertical-align: middle"><button type="button" class="btn btn-info">Seleccionar</button></td>
                                                                <td style="text-align:center;vertical-align: middle">{{$producto->categoria->nombre}}</td>
                                                                <td style="text-align:center;vertical-align: middle">{{$producto->codigo}}</td>
                                                                <td style="text-align:center;vertical-align: middle">{{$producto->nombre}}</td>
                                                                <td style="text-align:center;vertical-align: middle">{{$producto->descripcion}}</td>
                                                                <td style="text-align:center;vertical-align: middle; background-color:blanchedalmond ">{{$producto->stock}}</td>
                                                                <td style="text-align:center;vertical-align: middle">$ {{ number_format($producto->precio_compra, 0, ',', '.') }}</td>
                                                                <td style="text-align:center;vertical-align: middle">$ {{ number_format($producto->precio_venta, 0, ',', '.') }}</td>
                                                                <td style="text-align:center;vertical-align: middle"><img src="{{asset('storage/'.$producto->imagen)}}" width="80px" alt="imagen"></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <a href="{{url('admin/productos/create')}}" type="button" class="btn btn-success"> <i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-sm table-striped table-bordered table-hover ">
                                        <thead>
                                            <tr style="background-color: #cccccc">
                                                <th>Nro</th>
                                                <th>Codigo</th>
                                                <th>Cantidad</th>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label> <b>*</b>
                                            <input type="date" class="form-control"value="{{old('fecha')}}" name="fecha" required >
                                            @error('fecha')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <hr> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <a href="{{url('/admin/proveedores')}}" class="btn btn-secondary">Cancelar</a>   
                                <button type="submit" class="btn btn-primary" > <i class="fas fa-save" ></i> Registrar</button>  
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
    <script>
        $('#codigo').on('keyup', function(){
            var codigo = $(this).val();
            var cantidad = $('#cantidad').val();
            if(codigo.length > 0){
                $.ajax({
                    url: "{{route('admin.compras.tmp_compras')}}",
                    method: "POST",
                    data: {
                        _token:'{{csrf_token()}}',
                        codigo: codigo,
                        cantidad: cantidad
                    },
                    success: function(response){
                        if(response.success){
                            alert('El producto fue incorporado');
                        }else{
                            alert('No se encontro el producto');
                        }
                    },
                    error: function(error){
                        alert(error);
                    }
                });
            }
        });
    </script>
     <script>
        $('#mitabla').DataTable({
            "pageLength": 4,
            "language": {
                "decimal": "",
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(filtrado de _MAX_ Productos totales)",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            },
        });
    </script>
@stop