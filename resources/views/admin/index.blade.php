@extends('adminlte::page')

@section('content_header')
    <h1>Bienvenido  {{$empresa->nombre_empresa}}</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
              <a href="{{url('/admin/roles')}}" class="info-box-icon bg-info">
                <span class=""><i class="fas fa-user-check"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Roles Registrados</span>
                <span class="info-box-number">{{$total_roles}} roles</span>
              </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
              <a href="{{url('/admin/usuarios')}}" class="info-box-icon bg-primary">
                <span class=""><i class="fas fa-users"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Usuarios Registrados</span>
                <span class="info-box-number">{{$total_usuarios}} usuarios</span>
              </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
              <a href="{{url('/admin/categorias')}}" class="info-box-icon bg-success">
                <span class=""><i class="fas fa-tags"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Categorias Registradas</span>
                <span class="info-box-number">{{$total_categorias}} categorias</span>
              </div>
            </div>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
   
@stop