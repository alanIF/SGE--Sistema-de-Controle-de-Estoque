@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Entradas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">produto</th>
                            <th scope="col">data_entrada</th>
                            <th scope="col">data_fabricacao</th>
                            <th scope="col">data_validade</th>
                            <th scope="col">qtd  </th>
                            <th scope="col">observação</th>

                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($entradas as $e)
                            <td >{{$e->id}}</td>
                            <td>{{$e->produto}}</td>
                            <td>{{$e->data_entrada}}</td>
                            <td>{{$e->data_fabricacao}}</td>
                            <td>{{$e->data_validade}}</td>
                            <td>{{$e->qtd}}</td>
                            <td>{{$e->obs}}</td>

                            <td><a class="btn btn-warning " href="entradas/{{$e->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="entradas/delete/{{$e->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                     @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='9'><a class="btn btn-primary " href="{{url('entradas/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection