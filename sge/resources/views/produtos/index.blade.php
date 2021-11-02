@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produtos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">descrição</th>
                            <th scope="col">tipo</th>
                            <th scope="col">estoque mínimo</th>
                            <th scope="col">estoque atual</th>
                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                    @foreach($produtos as $p)
                        <tr>
                            <td >{{$p->id}}</td>
                            <td>{{$p->descricao}}</td>
                            <td>{{$p->tipo}}</td>
                            <td>{{$p->estoque_minimo}}</td>
                            <td>{{$p->estoque_atual}}</td>
                            <td><a class="btn btn-warning " href="produtos/{{$p->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="produtos/delete/{{$p->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='7'><a class="btn btn-primary " href="{{url('produtos/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection