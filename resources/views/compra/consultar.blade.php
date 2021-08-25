@extends('layouts.app')

@section('content')

<div class="container">
    @include('compra.__apptitulo')
    <div class="tile">
        <div class="tile-body">
        </div>
    <form action="{{url('/compra/listar')}}" method="GET">
        @csrf
        @include('compra._form')
        <div class="center">
            <button type="submit" class="btn btn-primary btn-lg">
                Voltar
            </button></div>
            
            <div class="col-lg-12" style="text-align: right;">
            <a class="btn btn-primary btn-lg" href="{{ url('/compra/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Consulta de Compras</a>
        </div>
    </form>
    
    </div>  
@endsection