@extends('adminlte::page')

@section('content_header')
    <h1> <b>Productos/Datos del producto</b> </h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body"> 
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Categoria</label>
                                            <p>{{$producto->categoria->nombre}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="codigo">Codigo</label> 
                                            <p>{{$producto->codigo}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Producto</label> 
                                           <p>{{$producto->nombre}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                           <p>{{$producto->descripcion}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock">Stock</label> <br>
                                            <input type="text" style="width: 50px; text-align: center; background-color:blanchedalmond " value="{{$producto->stock}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_minimo">Stock Minimo</label> 
                                            <p>{{$producto->stock_minimo}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_maximo">Stock Maximo</label> 
                                            <p>{{$producto->stock_maximo}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_compra">Precio de Compra</label> 
                                            <p>{{$producto->precio_compra}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio de Venta</label> 
                                            <p>{{$producto->precio_venta}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_ingreso">Fecha Ingreso</label> 
                                            <p>{{$producto->fecha_ingreso}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="imagen" >Imagen</label> <br>
                                    <td style="text-align:center"><img src="{{asset('storage/'.$producto->imagen)}}" width="100px" alt="imagen"></td>
                            </div>
                            </div>
                        </div>

                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/productos')}}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                 </div>
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
    
@stop