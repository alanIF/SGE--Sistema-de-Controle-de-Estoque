<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Redirect;

class EstoqueController {
    //atualizar qtd do estoque , remoção de entrada vem negativo, remoção de saida vem positivo
    public function atualizar_qtd($id_produto,$qtd){
        $produto= Produto::findOrFail($id_produto);
        $produto->estoque_atual=  $produto->estoque_atual +$qtd;
        $produto->save();
    }
}


?>