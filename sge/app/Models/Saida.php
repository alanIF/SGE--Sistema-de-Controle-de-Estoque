<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;
    protected $table = 'saida';
    protected $fillable= ['id_produto','id_usuario','qtd', 'data_saida', 'observacao', 'data_validade'];
}
