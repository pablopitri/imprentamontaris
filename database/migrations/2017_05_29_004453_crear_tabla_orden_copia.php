<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrdenCopia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copia_orden', function(Blueprint $table){
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->integer('copia_id')->unsigned();
            $table->foreign('copia_id')->references('id')->on('copias');
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
