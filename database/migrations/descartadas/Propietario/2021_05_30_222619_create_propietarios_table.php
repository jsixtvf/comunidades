<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Rafa Maya para que cuadre la integración
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->enum("Tratamiento", ["Sr", "Sra"]);
            $table->string("Nombre");
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->enum("Tipo", ["Fisica", "Juridica"]);
            $table->date('Fecha')->nullable();
            $table->string('DNI');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Calle');
            $table->string('Portal')->nullable();
            $table->string('Bloque')->nullable();
            $table->string('Escalera')->nullable();
            $table->string('Piso')->nullable();
            $table->string('Puerta')->nullable();
            $table->string('Codigo_pais');
            $table->string('CP');
            $table->string('Pais');
            $table->string('Provincia');
            $table->string('Localidad');

            $table->unsignedBigInteger('comunidad_id');
            $table->foreign('comunidad_id')->references('id')->on('comunidades')->onDelete('cascade');

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
        Schema::dropIfExists('propietarios');
    }
}
