@extends('adminlte::page')


@section('content_header')
    <h1>Proveedores/Listado de Proveedores</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                    <h3 class="card-title">Proveedores Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/proveedores/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i> Crear Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="mitabla"  class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Empresa</th>
                                <th scope="col" style="text-align: center">Direccion</th>
                                <th scope="col" style="text-align: center">Telefono</th>
                                <th scope="col" style="text-align: center">Email</th>
                                <th scope="col" style="text-align: center">Nombre del Proveedor</th>
                                <th scope="col" style="text-align: center">Celular</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($proveedores as $proveedore)
                            <tr>
                                <td style="text-align:center;vertical-align: middle">{{$contador++}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->empresa}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->direccion}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->telefono}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->email}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->nombre}}</td>
                                <td style="text-align:center;vertical-align: middle">{{$proveedore->celular}}</td>
                                <td style="text-align:center;vertical-align: middle">
                                    <div class="btn-group" usuario="group" aria-label="Basic example">
                                        <a href="{{url('/admin/proveedores',$proveedore->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/proveedores/'.$proveedore->id.'/edit')}}"" class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                        <form action="{{url('/admin/proveedores',$proveedore->id)}}" method="post" 
                                                onclick="preguntar{{$proveedore->id}} (event)" id="miFormulario{{$proveedore->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$proveedore->id}} (event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Estás seguro de eliminar este proveedor?',
                                                    text: 'No podrás recuperar este proveedor una vez eliminado',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$proveedore->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
    <script>
        $('#mitabla').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 proveedores",
                "infoFiltered": "(filtrado de _MAX_ proveedores totales)",
                "lengthMenu": "Mostrar _MENU_ proveedores",
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
            }
        });
    </script>
@stop