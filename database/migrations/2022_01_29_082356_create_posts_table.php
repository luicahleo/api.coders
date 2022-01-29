<?php

use App\Models\Post;
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
            $table->string('slug')->unique(); //que sea unico porque usaremos el slug como identificador
            $table->text('extract');
            $table->longText('body');
            $table->enum('status',[Post::BORRADOR,Post::PUBLICADO])->default(Post::BORRADOR); //en este campo solo pueden ir estos dos valores, por defecto lleva el 1 que es BORRADOR

           /* //definimos las llaves foraneas
            $table->unsignedBigInteger('category_id');//creamos el campo category_id
            $table->foreign('category_id')->references('id')->on('categories');//le damos la restriccion de llave foranea y hace referencia a la tabla categories
            */

            //otra manera de hacerlo mas facil, pero siempre y cuando este siguiendo las convenciones de LARAVEL
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            //ahora para user_id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');




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
