@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bienvenido  {{$empresa->nombre_empresa}}</h1>
    <hr>
@stop

@section('content')
    <p></p>
@stop

@section('css')
   
@stop

@section('js')
    @if(  (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono'))))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{$icono}}",
                title: "{{$mensaje}}",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif
@stop