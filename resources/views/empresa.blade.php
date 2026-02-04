@extends('layout.app')
@section('titulopagina','Empresa E-commerce')
@push('css')
<style>
    .fondo{
        background: #302886;
}

.img-responsive{
    width: 100%;
    height: 100%;
}

</style>

@endpush

@section('titulo')
Bienvenido a la página de EC
@endsection

@section("Subtitulo");
Explorando las oportunidades con Laravel 12
@endsection

@section("link1","Active");
@section("titulo1")
<h1>About Me</h1>
@endsection
@section("descripcion_about")
    {{$descripcion_about}}
@endsection
@section("Autor")
    {{$nombre}}
@endsection
@section("acctividad", $actividad)
@section("texto_ejemplo")
    {{$texto_ejemplo}}
@endsection
@section("contenido_listado")
    <h2>Listado de Usuarios Registados</h2>
 <u1>
    @if(@isset($listadousuarios))
        <table id="tablausuarios" class="table table-striped table bordered">
            <thead>
                <tr>
                    <h1>Nombre</h1>
                    <h1>Email</h1>
                    <h1>Telefono</h1>
                    <h1>Calle</h1>
                </tr>
            </thead>
            <tbody>
            @foreach ($listadousuarios as $Usuario)
             <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->calle}}</td>    
             </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <p> La variable de listado de usuarios no etsa definida</p>
    @endif
 </u1>
 @endsection