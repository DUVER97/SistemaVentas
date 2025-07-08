@extends('adminlte::page')


@section('content_header')
    <h1>Productos/Listado de Productos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                    <h3 class="card-title">Productos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/productos/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i> Crear Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Codigo</th>
                                <th scope="col" style="text-align: center">Nombre</th>
                                <th scope="col" style="text-align: center">Descripcion</th>
                                <th scope="col" style="text-align: center">stock</th>
                                <th scope="col" style="text-align: center">Precio de Compra</th>
                                <th scope="col" style="text-align: center">Precio de Venta</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($productos as $producto)
                            <tr>
                                <td style="text-align:center">{{$contador++}}</td>
                                <td style="text-align:center">{{$producto->codigo}}</td>
                                <td style="text-align:center">{{$producto->nombre}}</td>
                                <td style="text-align:center">
                                    <div class="btn-group" usuario="group" aria-label="Basic example">
                                        <a href="{{url('/admin/productos',$producto->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/productos/'.$producto->id.'/edit')}}"" class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                        <form action="{{url('/admin/productos',$producto->id)}}" method="post" 
                                                onclick="preguntar{{$producto->id}} (event)" id="miFormulario{{$producto->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$producto->id}} (event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Estás seguro de eliminar este Producto?',
                                                    text: 'No podrás recuperar este Producto una vez eliminado',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$producto->id}}');
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
    
@stop