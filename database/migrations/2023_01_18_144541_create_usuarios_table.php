<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->string('nombres', 100)->nullable(false);
            $table->string('apellidos', 100)->nullable(false);
            $table->string('cedula', 10)->nullable(false);
            $table->string('pais', 100)->nullable(false);
            $table->string('email', 150)->nullable(false);
            $table->string('direccion', 180)->nullable(false);
            $table->string('celular', 10)->nullable(false);

            $table->foreign('id_categoria')
            ->references('id')
            ->on('categorias')
            ->onUpdate('set null')
            ->onDelete('set null');
            
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
        Schema::dropIfExists('usuarios');
    }
};
