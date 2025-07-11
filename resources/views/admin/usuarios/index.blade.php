@extends('adminlte::page')


@section('content_header')
    <h1>Listado de Usuarios</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
              <div class="card-header">
                    <h3 class="card-title">Usuarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/usuarios/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i> Crear Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="mitabla" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Rol del Usuario</th>
                                <th scope="col" style="text-align: center">Nombre del Usuario</th>
                                <th scope="col" style="text-align: center">Email</th>
                                <th scope="col" style="text-align: center">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td style="text-align:center">{{$contador++}}</td>
                                <td style="text-align:center">{{$usuario->roles->pluck('name')->implode(', ')}}</td>
                                <td style="text-align:center">{{$usuario->name}}</td>
                                <td style="text-align:center">{{$usuario->email}}</td>
                                <td style="text-align:center">
                                    <div class="btn-group" usuario="group" aria-label="Basic example">
                                        <a href="{{url('/admin/usuarios',$usuario->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/usuarios/'.$usuario->id.'/edit')}}"" class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                        <form action="{{url('/admin/usuarios',$usuario->id)}}" method="post" 
                                                onclick="preguntar{{$usuario->id}} (event)" id="miFormulario{{$usuario->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$usuario->id}} (event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Estás seguro de eliminar este Usuario?',
                                                    text: 'No podrás recuperar este usuario una vez eliminado',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$usuario->id}}');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(filtrado de _MAX_ Usuarios totales)",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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