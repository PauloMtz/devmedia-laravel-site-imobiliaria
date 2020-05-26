<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelsTable extends Migration
{
    /**
     * create models: php artisan make:model Permissao -m
     * php artisan make:model Papel -m
     *
     * Run the migrations: php artisan migrate
     * see migrations: php artisan migrate:status
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->timestamps();
        });

        // tabelas extras para relacionamento muitos-para-muitos
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->integer('permissao_id')->unsigned();
            $table->integer('papel_id')->unsigned();

            $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

            $table->primary(['permissao_id', 'papel_id']);
        });

        Schema::create('papel_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('papel_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

            $table->primary(['user_id', 'papel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('papels');
    }
}
