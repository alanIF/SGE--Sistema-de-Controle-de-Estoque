<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EstoqueController;
use Redirect;

class EntradaController extends Controller
{
    public function index(){
        $sql = 'Select e.id id,u.name usuario, p.descricao produto,e.data_entrada data_entrada,e.data_fabricacao data_fabricacao,e.data_validade data_validade,e.qtd qtd ,e.observacao obs from entrada e,produto p,users u where e.id_produto=p.id and e.id_usuario=u.id';
        $entradas = \DB::select($sql);
        return view('entradas.index', ['entradas' => $entradas]);
    }
    // form de cadastrar
    public function new(){
        $produtos = Produto::get();

        return view('entradas.form',['produtos' => $produtos]);
    }
    public function add(Request $request){
        $entrada = new Entrada();
        $user = Auth::id();

        $entrada->id_produto=$request->id_produto;
        $entrada->id_usuario=$user;
        $entrada->qtd= $request->qtd;
        $entrada->data_entrada= $request->data_entrada;

        $entrada->data_fabricacao= $request->data_fabricacao;
        $entrada->data_validade= $request->data_validade;
        $entrada->observacao= $request->obs;
        $entrada->save();

        //atualizar qtd
        $qtd=  $entrada->qtd;
        $estoque = new EstoqueController();
        $estoque->atualizar_qtd($entrada->id_produto, $qtd);
        return Redirect::to('/entradas');
    }
    public function update($id ,Request $request){
        $entrada= Entrada::findOrFail($id);
        $entrada->data_fabricacao = $request->data_fabricacao;
        $entrada->data_validade = $request->data_validade;
        $entrada->observacao = $request->obs;
        $entrada->save();
        \Session::flash('msg_update', 'Entrada Atualizada com sucesso!');
        return Redirect::to('/entradas');
    }
    public function edit($id){
        $entrada= Entrada::findOrFail($id);
        return view('entradas.form', ['entrada'=> $entrada ]);
    }
    public function delete($id){
        $entrada= Entrada::findOrFail($id);
        $qtd=  -$entrada->qtd;
        $estoque = new EstoqueController();
        $estoque->atualizar_qtd($entrada->id_produto, $qtd);
        $entrada->delete();
        return Redirect::to('/entradas');
    }
}
