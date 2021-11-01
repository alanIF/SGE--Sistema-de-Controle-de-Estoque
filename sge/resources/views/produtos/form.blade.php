@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produto</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('produtos/update')}}/{{$produto->id}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição </label>
                <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="{{$produto->descricao}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo </label>
                <input type="text" name="tipo" class="form-control" placeholder="Tipo" value="{{$produto->tipo}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estoque Mínimo </label>
                <input type="number" name="estoque_minimo" class="form-control" placeholder="Estoque" value="{{$produto->estoque_minimo}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estoque Atual </label>
                <input type="number" name="estoque_atual" class="form-control" placeholder="Estoque Atual" value="{{$produto->estoque_atual}}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('produtos/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('produtos/add')}}" method="post"> 
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição </label>
                <input type="text" name="descricao" class="form-control" placeholder="Descrição"  required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo </label>
                <input type="text" name="tipo" class="form-control" placeholder="Tipo" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estoque Mínimo </label>
                <input type="number name="estoque_minimo" class="form-control" placeholder="Estoque" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estoque Atual </label>
                <input type="number" name="estoque_atual" class="form-control" placeholder="Estoque Atual" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('produtos/')}}">Voltar</a>
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
