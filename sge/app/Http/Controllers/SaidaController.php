<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saida;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EstoqueController;
use Redirect;

class SaidaController extends Controller
{
    public function index(){
        $sql = 'Select s.id id,u.name usuario, p.descricao produto,s.data_saida data_saida,s.qtd qtd ,s.observacao obs from saida s,produto p,users u where s.id_produto=p.id and s.id_usuario=u.id';
        $saidas = \DB::select($sql);
        return view('saidas.index', ['saidas' => $saidas]);
    }
    // form de cadastrar
    public function new(){
        $produtos = Produto::get();

        return view('saidas.form',['produtos' => $produtos]);
    }
    public function add(Request $request){
        $saida = new Saida();
        $user = Auth::id();
        
        $produto= Produto::findOrFail($request->id_produto);
        if($request->qtd > $produto->estoque_atual){
            return redirect()->back()->with(['message' => 'A quantidade que você digitou não pode ser maior que a do estoque!']);
        }else{
            $saida->id_produto=$request->id_produto;
            $saida->id_usuario=$user;
            $saida->qtd= $request->qtd;
            $saida->data_saida= $request->data_saida;

            $saida->observacao= $request->obs;
            $saida->save();

            //atualizar qtd
            $qtd=  -$saida->qtd;
            $estoque = new EstoqueController();
            $estoque->atualizar_qtd($saida->id_produto, $qtd);
            return Redirect::to('/saidas');
        }
        
    }
    public function update($id ,Request $request){
        $saida= Saida::findOrFail($id);
        $saida->observacao = $request->obs;
        $saida->save();
        \Session::flash('msg_update', 'Saída Atualizada com sucesso!');
        return Redirect::to('/saidas');
    }
    public function edit($id){
        $saida= Saida::findOrFail($id);
        return view('saidas.form', ['saida'=> $saida ]);
    }
    public function delete($id){
        $saida= Saida::findOrFail($id);
        $qtd=  +$saida->qtd;
        $estoque = new EstoqueController();
        $estoque->atualizar_qtd($saida->id_produto, $qtd);
        $saida->delete();
        return Redirect::to('/saidas');
    }
}
