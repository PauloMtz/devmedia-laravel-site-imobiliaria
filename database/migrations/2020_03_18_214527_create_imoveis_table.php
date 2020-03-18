<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// php artisan make:migration create_imoveis_table --create=imoveis
class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            // relacionamento com a tabela tipos
            $table->integer('tipo_id')->unsigned(); // unsigned não aceita negativos
            $table->foreign('tipo_id')->references('id')->on('tipos');
            // relacionamento com a tabela cidades
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            // demais campos da tabela
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->enum('status', ['venda', 'aluguel']);
            $table->string('endereco');
            $table->string('cep');
            $table->decimal('valor', 6,2); // 6 casas antes da vírgula e 2 casas decimais
            $table->integer('dormitorios');
            $table->string('detalhes');
            $table->text('mapa')->nullable();
            $table->bigInteger('visualizacoes')->default(0); // valor inicial: 0
            $table->enum('publicar', ['sim', 'nao'])->default('nao');

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
        Schema::drop('imoveis');
    }
}
