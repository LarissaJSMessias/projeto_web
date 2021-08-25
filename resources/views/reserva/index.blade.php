@extends('layouts.app')
@section('content')
<div class="container">
    <div class="app-title">
        <h1>
            <i class="fa fa-edit">Lista de Reservas</i>
        </h1>
        <ul class="app-bredcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/reserva/home')}}">Menu Principal</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form class="form form-inline" action="{{ url('search_reserva') }}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-1">Nome:</label> <input type="text"
                                class="form-control col-sm-9" id="nome" name="nome"
                                placeholder="Digite um nome para pesquisar" value="{{ $filters['nome'] ?? '' }}" />
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar <i class="fa fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <div id="no-more-tables">
                    <table class="table table-striped table-bordered table-hover cf">
                        <thead class="cf">
                            <tr>
                                <th style="font-weight: bold; text-align: center;">Codigo</th>
                                <th style="font-weight: bold; text-align: center;">Data</th>
                                <th style="font-weight: bold; text-align: center;">Horario</th>
                                <th style="font-weight: bold; text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                               <tr>
                                   <td data-title="Id"  style="text-align: center" >{{$registro->id }}</td>
                                   <td data-title="Nome"  style="text-align: center">{{$registro->data}}</td>
                                   <td data-title="Email"  style="text-align: center">{{$registro->horario}}</td>
                                   <td data-title="Ações"  style="text-align: center">
                                       <a class="btn btn-info btn-sm"  style="text-align: center" href="{{url('reserva/alterar', $registro->id)}}"><i class="fa fa-pencil"></i></a>
                                       <a class="btn btn-danger btn-sm"  style="text-align: center" href="{{url('reserva/excluir', $registro->id)}}"><i class="fa fa-trash"></i></a>
                                       <a class="btn btn-warning btn-sm"  style="text-align: center" href="{{url('reserva/consultar', $registro->id)}}"><i class="fa fa-address-book"></i></a>
                                   </td>
                               </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    @if(@isset($filters))
                        {{$registros->appends($filters)->links()}}
                    @else
                        {{$registros->links()}}  
                    @endisset
                    
                    <a class="btn btn-success btn-sm" href="{{url('reserva/incluir')}}">Incluir<i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    
@endsection