<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Redirect;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::get();
        return view('produtos.index', ['produtos' => $produtos]);
    }
    // form de cadastrar
    public function new(){
        return view('produtos.form');
    }
    public function add(Request $request){
        $produto = new Produto();
        $produto= $produto->create($request->all());
        return Redirect::to('/produtos');
    }
    public function update($id ,Request $request){
        $produto= Produto::findOrFail($id);
        $produto->update($request->all());
        \Session::flash('msg_update', 'Produto Atualizado com sucesso!');
        return Redirect::to('/produtos');
    }
    public function edit($id){
        $produto= Produto::findOrFail($id);
        return view('produtos.form', ['produto'=> $produto]);
    }
    public function delete($id){
        $produto= Produto::findOrFail($id);
        $produto->delete();
        return Redirect::to('/produtos');

    }
}
