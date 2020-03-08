@extends('layouts.layout')

@section('titulo')
    Crear nuevo Desarrollador
@endsection

@section('contenido')
    <h1 class="text-center">Crear nuevo desarrollador</h1>
    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"><strong>.Ups.</strong> Algo anda mal...</div>
        <ul>
            @foreach ($errors->all() as $error)

            <li>{{$error}}</li>

            @endforeach
        </ul>
    </div>
    @endif
    <br><br>
    <form action="{{route('desarrollador.store')}} " method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nombre del desarrollador:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> Apellido del desarrollador:</label>
                <input type="text" class="form-control" name="apellido" placeholder="apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> Telefono del desarrollador:</label>
                <input type="number" class="form-control" name="telefono" placeholder="000000">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> Direccion del desarrollador:</label>
                <input type="text" class="form-control" name="direccion" placeholder="direccion">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> idProyecto:</label>
                <input type="text" class="form-control" name="idProyecto" placeholder="idProyecto">
            </div>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary">Crear desarrollador</button>   
        </div>
    </form>
@endsection