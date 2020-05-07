<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run
     * php artisan make:controller Admin\SlideController [controller: app/Http/Controllers/Admin...]
     * php artisan make:model Slide -m [cria o model: app/Slide.php]
     * php artisan migrate [cria a tabela no banco de dados]
     * depois disso, implementar rotas [app/Http/routes.php]
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->string('link')->nullable();
            $table->integer('ordem')->nullable();
            $table->enum('publicado', ['sim', 'nao'])->default('nao');
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
        Schema::drop('slides');
    }
}
