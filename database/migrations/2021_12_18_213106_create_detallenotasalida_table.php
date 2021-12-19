<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallenotasalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallenotasalida', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('cantidad');
            $table->unsignedBigInteger('idtallaproducto');
            $table->foreign('idtallaproducto')->references('id')->on('tallaproducto');
            $table->unsignedBigInteger('idnotasalida');
            $table->foreign('idnotasalida')->references('id')->on('notasalida');
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
        Schema::dropIfExists('detallenotasalida');
    }
}
