<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function(Blueprint $table){
            $table->increments('id');
            $table->string('papel')->nullable();
            $table->string('tapa')->nullable();
            $table->string('folio')->nullable();
            $table->string('inter')->nullable();
            $table->string('color')->nullable();
            $table->string('tamaño')->nullable();
            $table->string('observacion')->nullable();
            $table->string('cambios',20)->nullable();
            $table->integer('total');
            $table->date('fecha_ingreso');
            $table->date('fecha_entrega');
            $table->integer('id_chile_compra')->nullable();
            $table->string('oc')->nullable();
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
        Schema::dropIfExists('ordenes');
    }
}
