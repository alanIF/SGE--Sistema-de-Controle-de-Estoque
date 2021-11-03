@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produtos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                        </div>
                        <div class="col-auto">
                            <a  href="{{url('produtos/')}}"> <i class="fa fa-archive fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Entradas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                        </div>
                        <div class="col-auto">
                            <a  href="{{url('entradas/')}}"> <i class="fa fa-plus-circle fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saidas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                        </div>
                        <div class="col-auto">
                            <a  href="{{url('saidas/')}}"> <i class="fa fa-minus-circle fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Relatorios</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <a  href="{{url('relatorios/')}}"> <i class="fa fa-building fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produtos Abaixo do Estoque Mínimo</div>

                <div class="card-body">
                    

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">produto</th>
                            <th scope="col">estoque atual</th>
                            <th scope="col">estoque mínimo</th>

                            


                            </tr>
                        </thead>
                        <tbody>
                    @foreach($produtos as $p)
                    @if ( $p->estoque_atual < $p->estoque_minimo )
                    <tr>
                            <td>{{$p->descricao}}</td>
                            <td>{{$p->estoque_atual}}</td>
                            <td>{{$p->estoque_minimo}}</td>

                            </tr>
                    @endif
                       
                    @endforeach
                        </tbody>
                       
                        </table>

                </div>
        </div>
    </div>
</div>
@endsection
