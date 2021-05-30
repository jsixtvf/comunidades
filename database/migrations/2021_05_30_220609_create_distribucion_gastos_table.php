<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribucionGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Rafa Maya para que cuadre la integración
        Schema::create('distribucion_gastos', function (Blueprint $table) {
            $table->id();
            $table->string('propiedad');
            $table->decimal('coeficiente');
            $table->decimal('unidadRegistral');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->integer('orden');
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
        Schema::dropIfExists('distribucion_gastos');
    }
}
