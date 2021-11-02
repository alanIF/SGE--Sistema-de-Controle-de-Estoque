@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Saídas</div>

                <div class="card-body">
                @extends('alerts.message')

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif

            @if(Request::is('*/edit'))
            <form action="{{url('saidas/update')}}/{{$saida->id}}" method="post">
            @csrf
            
         
           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Data de Validade </label>
                <input type="text" class="form-control" name="data_validade" placeholder="Data de Validade" value="{{$saida->data_validade}}"   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
            </div>
            <div class="mb-3">
                  <textarea class="form-control" rows="4" placeholder="Observação" name="obs">{{$saida->observacao}}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('saidas/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('saidas/add')}}" method="post"> 
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição </label>
                <select class="form-control select2" name="id_produto" style="width: 100%;" required="">
                    @foreach($produtos as $p)

                    <option value="{{$p->id}}">{{$p->descricao}} - {{$p->estoque_atual}}  </option>
                             
                    @endforeach

                </select>
            </div>
         

            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Quantidade</label>
                <input class="form-control" name="qtd" type="number" placeholder="Quantidade" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Data da Saída </label>
                <input type="text" class="form-control" name="data_saida" placeholder="Data da Saída"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required value="<?php echo date('d/m/y')?>" readonly>
            </div>
         
            <div class="mb-3">
                  <textarea class="form-control" rows="4" placeholder="Observação" name="obs"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning " href="{{url('saidas/')}}">Voltar</a>
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
