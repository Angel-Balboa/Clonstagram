<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')
            ->constrained('perfiles')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('Titulo');
            $table->string('Descripcion');
            $table->string('Imagen');
            $table->integer('Likes')->nullable();
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('publicacions');
    }
}
