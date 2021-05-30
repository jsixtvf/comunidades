<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaDistribucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Rafa Maya para que cuadre la integración
        Schema::create('lista_distribuciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propietario_id');
            $table->unsignedBigInteger('propiedad_id');
            $table->double('coeficiente');
            $table->double('unidaRegistral');

            $table->foreign('propietario_id')
                -> references('id')->on('distribucion_gastos')->onDelete('cascade');

            $table->foreign('propiedad_id')
                -> references('id')->on('distribucion_gastos')->onDelete('cascade');

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
        Schema::dropIfExists('lista_distribuciones');
    }
}
