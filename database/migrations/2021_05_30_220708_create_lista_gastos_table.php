<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Rafa Maya para que cuadre la integración seguramente esta tabla debería ir en la tabla gastos
        Schema::create('lista_gastos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('proveedor');
            $table->timestamp('fecha');
            $table->decimal('importe');
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
        Schema::dropIfExists('lista_gastos');
    }
}
