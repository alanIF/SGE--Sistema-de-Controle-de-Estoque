@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Saídas</div>

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
                            <th scope="col">usuario</th>
                            <th scope="col">produto</th>
                            <th scope="col">data saída</th>
                            <th scope="col">qtd  </th>
                            <th scope="col">observação</th>

                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($saidas as $s)
                        <tr>
                            <td >{{$s->id}}</td>
                            <td>{{$s->usuario}}</td>
                            <td>{{$s->produto}}</td>
                            <td>{{$s->data_saida}}</td>
                            <td>{{$s->qtd}}</td>
                            <td>{{$s->obs}}</td>

                            <td><a class="btn btn-warning " href="saidas/{{$s->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="saidas/delete/{{$s->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='10'><a class="btn btn-primary " href="{{url('saidas/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection