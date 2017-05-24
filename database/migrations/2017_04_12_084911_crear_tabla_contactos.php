<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaContactos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table){
            $table->increments('id');
            $table->string('razon_social');
            $table->string('rut');
            $table->string('empresa')->nullable();
            $table->string('nombre_contacto');
            $table->string('giro')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('fono_contacto')->nullable();
            $table->string('mail')->nullable();
            $table->string('nombre_fantasia')->nullable();
            $table->string('comuna')->nullable();
            $table->string('nombre_contador')->nullable();
            $table->string('fono_contador')->nullable();
            $table->string('email_contador')->nullable();
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
        Schema::dropIfExists('contactos');
    }
}
