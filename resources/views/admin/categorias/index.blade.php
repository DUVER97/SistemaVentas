@extends('adminlte::page')


@section('content_header')
    <h1>Listado de Categorias</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
              <div class="card-header">
                    <h3 class="card-title">Categoria Registrada</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/categorias/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i> Crear Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Nombre de la Categoria</th>
                                <th scope="col" style="text-align: center">Descripcion</th>
                                <th scope="col" style="text-align: center">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td style="text-align:center">{{$contador++}}</td>
                                <td style="text-align:center">{{$categoria->nombre}}</td>
                                <td style="text-align:center">{{$categoria->descripcion}}</td>
                                <td style="text-align:center">
                                    <div class="btn-group" usuario="group" aria-label="Basic example">
                                        <a href="{{url('/admin/categorias',$categoria->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/categorias/'.$categoria->id.'/edit')}}"" class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                        <form action="{{url('/admin/categorias',$categoria->id)}}" method="post" 
                                                onclick="preguntar{{$categoria->id}} (event)" id="miFormulario{{$categoria->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$categoria->id}} (event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Estás seguro de eliminar esta Categoria?',
                                                    text: 'No podrás recuperar esta categoria una vez eliminado',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$categoria->id}}');
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