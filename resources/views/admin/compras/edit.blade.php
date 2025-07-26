@extends('adminlte::page')

@section('content_header')
    <h1> <b>Compras/Modificar datos de la compra</b> </h1>
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
                    <form action="{{url('/admin/compras',$compra->id)}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label> 
                                            <input type="number" style="text-align: center;background-color:antiquewhite " class="form-control" id="cantidad" value="1" name="cantidad" required >
                                            @error('cantidad')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Codigo</label> 
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
                                                                <td style="text-align:center;vertical-align: middle"><button type="button" class="btn btn-info seleccionar-btn" data-id="{{$producto->codigo}}">Seleccionar</button></td>
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
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cont = 1; $total_cantidad = 0; $total_compra = 0;?>
                                            @foreach($compra->detalles as $detalle)
                                            <tr>
                                                <td style="text-align:center">{{$cont++}}</td>
                                                <td style="text-align:center">{{$detalle->producto->codigo}}</td>
                                                <td style="text-align:center">{{$detalle->cantidad}}</td>
                                                <td style="text-align:center">{{$detalle->producto->nombre}}</td>
                                                <td style="text-align:center">$ {{ number_format($detalle->precio_compra, 0, ',', '.') }}</td>
                                                <td style="text-align:center">
                                                    $ {{ number_format($costo = $detalle->cantidad * $detalle->precio_compra, 0, ',', '.') }}
                                                </td>
                                                <td style="text-align:center">
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{$detalle->id}}"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @php
                                            $total_cantidad += $detalle->cantidad;
                                            $total_compra  += $costo;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td colspan="2" style="text-align:right"><b>Total Cantidad</b></td>
                                                <td style="text-align:center"><b>{{$total_cantidad}}</b></td>
                                                <td colspan="2" style="text-align:right"><b>Total Compra</b></td>
                                                <td style="text-align:center"><b>$ {{ number_format($total_compra, 0, ',', '.') }}</b></td>
                                                
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_proveedor"> <i class="fas fa-search"></i> Buscar Proveedor</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="exampleModalLabel">Listado de Proveedores</h1>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table id="mitabla2"  class="table table-striped table-bordered table-hover table-sm table-responsive" >
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center">Nro</th>
                                                                        <th scope="col" style="text-align: center">Accion</th>
                                                                        <th scope="col" style="text-align: center">Empresa</th>
                                                                        <th scope="col" style="text-align: center">Telefono</th>
                                                                        <th scope="col" style="text-align: center">Nombre del proveedor</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $contador = 1; ?>
                                                                    @foreach($proveedores as $proveedore)
                                                                        <tr>
                                                                            <td style="text-align:center;vertical-align: middle">{{$contador++}}</td>
                                                                            <td style="text-align:center;vertical-align: middle"><button type="button" class="btn btn-info seleccionar-btn-proveedor" data-id="{{$proveedore->id}}" data-empresa="{{$proveedore->empresa}}">Seleccionar</button></td>
                                                                            <td style="text-align:center;vertical-align: middle">{{$proveedore->empresa}}</td>
                                                                            <td style="text-align:center;vertical-align: middle">{{$proveedore->telefono}}</td>
                                                                            <td style="text-align:center;vertical-align: middle">{{$proveedore->nombre}}</td>
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
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="empresa_proveedor" value="{{$detalle->proveedor->empresa}}" disabled>     
                                        <input type="text" class="form-control" id="id_proveedor" value="" name="proveedor_id" hidden>     
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha de compra</label> 
                                            <input type="date" class="form-control"value="{{$compra->fecha}}" name="fecha" >
                                            @error('fecha')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Comprobante</label> 
                                           <input type="text" class="form-control"value="{{$compra->comprobante}}" name="comprobante" >
                                            @error('comprobante')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="precio_total">Precio Total</label> 
                                            <input type="text" style="text-align:center; background-color:gold; font-weight:bold;"  class="form-control"value="$ {{ number_format($total_compra, 0, ',', '.') }}" name="precio_total" required >
                                            @error('precio_total')
                                            <small style="color:red;">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> 
                                        <button type="submit" class="btn btn-success btn-lg btn-block" > <i class="fas fa-save" ></i> Actualizar Compra</button>  
                                        </div>
                                    </div>
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

        $('.seleccionar-btn-proveedor').click(function(){
            var id_proveedor = $(this).data('id');
            var empresa = $(this).data('empresa');
            $('#empresa_proveedor').val(empresa);
            $('#id_proveedor').val(id_proveedor);
            $('#exampleModal_proveedor').modal('hide');
            
        });

        $('.seleccionar-btn').click(function(){
            var id_producto = $(this).data('id');
            $('#codigo').val(id_producto);
            $('#exampleModal').modal('hide');
            $('#exampleModal').on('hidden.bs.modal', function(){
                $('#codigo').focus();
            });
            
        });

        $('.delete-btn').click(function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                        url: "{{url('/admin/compras/create/tmp')}}/"+id,
                        type: "POST",
                        data: {
                            _token:'{{csrf_token()}}',
                            _method:'DELETE'
                        },
                        success: function(response){
                            if(response.success){
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se elimino el producto",
                                showConfirmButton: false,
                                timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('Error no se pudo eliminar el producto');
                            }
                        },
                        error: function(error){
                            alert(error);
                        }
                    });
            }
        });

        $('#codigo').focus();
        $('#form_compra').on('keypress',function(e){
            if(e.keyCode ===13 ){
                e.preventDefault();
            }
        });

        $('#codigo').on('keyup', function (e) {
            if(e.which === 13){
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
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se registro el producto",
                                showConfirmButton: false,
                                timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('No se encontro el producto');
                            }
                        },
                        error: function(error){
                            alert(error);
                        }
                    });
                }
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

        $('#mitabla2').DataTable({
            "pageLength": 4,
            "language": {
                "decimal": "",
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(filtrado de _MAX_ Proveedores totales)",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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