<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Perfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('perfiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_usuario')->unique()
            ->constrained('users')
            ->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
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
        //
    }
}
