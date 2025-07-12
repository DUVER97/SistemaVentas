@extends('adminlte::page')

@section('content_header')
    <h1> <b>Provedores/Datos del Proveedor</b> </h1>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nombre de la empresa</label> 
                                    <p>{{$proveedor->empresa}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Direccion</label> 
                                    <p>{{$proveedor->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Telefono</label> 
                                    <p>{{$proveedor->telefono}}</p>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Email</label> 
                                        <p>{{$proveedor->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre del proveedor</label> 
                                        <p>{{$proveedor->nombre}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Celular del proveedor</label> 
                                        <p>{{$proveedor->celular}}</p>
                                    </div>
                                </div>
                            </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/proveedores')}}" class="btn btn-secondary">Volver</a>
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