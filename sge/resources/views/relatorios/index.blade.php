@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Relatório</div>

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
                            <th scope="col">produto</th>
                            <th scope="col">quantidade de entradas </th>
                            <th scope="col">quantidade de saídas </th>
                            <th scope="col">estoque atual</th>
       </tr>
                        </thead>
                        <tbody>
                    @foreach($produtos as $p)
                        <tr>
                            <td >{{$p->id}}</td>
                            <td>{{$p->produto}}</td>
                            <td>{{$p->entradas}}</td>
                            <td>{{$p->saidas}}</td>
                            <td>{{$p->estoque_atual}}</td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                        
                        </table>

                </div>
        </div>
    </div>
</div>
@endsection