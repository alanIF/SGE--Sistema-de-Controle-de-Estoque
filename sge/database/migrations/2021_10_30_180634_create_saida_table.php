<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saida', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produto');
            $table->bigInteger('id_usuario');
            $table->bigInteger('qtd');
            $table->text('data_saida');
            $table->text('observacao');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saida');
    }
}
