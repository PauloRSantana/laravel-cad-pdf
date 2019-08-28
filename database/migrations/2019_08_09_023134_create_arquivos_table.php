<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_arquivo');
            $table->string('nome_arquivo');
            $table->string('dsc_arquivo');
            $table->string('num_arquivo');
            $table->string('imagem');
            $table->date('dat_arquivo');
            $table->date('dat_inclusao');
            $table->date('dat_exclusao');
            $table->date('dat_alteracao');
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
        Schema::dropIfExists('arquivos');
    }
}
