<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto as Produto;
use App\Http\Resources\Produto as ProdutoResource;

class ProdutoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos= Produto::paginate(15);
        return ProdutoResource::collection($produtos);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->descricao = $request->input('descricao');
        $produto->estoque_atual = $request->input('estoque_atual');
        $produto->estoque_minimo = $request->input('estoque_minimo');

        $produto->tipo= $request->input('tipo');

        if( $produto->save() ){
        return new ProdutoResource( $produto );
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail( $id );
        return new ProdutoResource( $produto );
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail( $request->id );
        $produto->descricao = $request->input('descricao');
        $produto->estoque_atual = $request->input('estoque_atual');
        $produto->estoque_minimo = $request->input('estoque_minimo');

        $produto->tipo= $request->input('tipo');
    
        if( $produto->save() ){
          return new ProdutoResource( $produto);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail( $id );
        if( $produto->delete() ){
          return new ProdutoResource( $produto );
        }
    }
}
