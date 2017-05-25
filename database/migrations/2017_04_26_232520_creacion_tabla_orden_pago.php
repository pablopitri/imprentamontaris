<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaOrdenPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_pago', function(Blueprint $table){
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->integer('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
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
