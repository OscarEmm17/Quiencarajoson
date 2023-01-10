<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');

            $table->text('extract');
            $table->longText('body'); //Texto extenso

            $table->enum('status', [1, 2])->default(1); // Le podemos indicar los valore que puede obtener (1- Borrador y 2- Publicado) e indicamos que por defecto valor 1

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            //Clave foraneas
            // Co la siguinete clave foranea vamos a indicar la relacion con la user y que si se eleimina el user se elimina el post por defecto
            // Campo con el vamos a relacionar -> elemento que relaciona con la otra table -> la table y definimos que se elimine por default al eliminar el user relacionado
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
