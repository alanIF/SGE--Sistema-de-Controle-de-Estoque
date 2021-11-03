<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index(){
        $sql = 'Select p.id id,p.descricao produto, count(e.id) entradas,count(s.id) saidas,p.estoque_atual estoque_atual from entrada e,produto p,saida s where e.id_produto=p.id and p.id=s.id_produto group by (p.id)';
        $produtos = \DB::select($sql);
        return view('relatorios.index', ['produtos' => $produtos]);
    }
    
}
