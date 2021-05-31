<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Integracion parte de Sixto Vera para que cuadre la integración
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->date('fechalta');
            $table->string('cif', 9)->unique();

            // $table->tipo  enum , y en la vista
            $table->enum('tipo', ['Admin. Pública', 'Telefonía', 'Agua', 'Antenas', 'Antiplaga',
                'Ascensores', 'Comunidad', 'Desatascos', 'Electricidad', 'Electricista', 'Entidad Financiera', 'Fontanería',
                'Impermeabilizaciones', 'Jardinería', 'Jurídico', 'Limpieza', 'Piscinas', 'Porteros automáticos',
                'Puertas garajes', 'Rehabilitación', 'Seguros']);

            // $table->calificacion   enum pesimo mala normal buena excelente
            $table->enum('calificacion', ['Pésima', 'Mala', 'Normal', 'Buena', 'Excelente']);

            // $table->figura   enum fisica juridica
            $table->enum('figura', ['Física', 'Jurídica']);

            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('telefono');
            $table->string('calle')->nullable();
            $table->smallInteger('portal')->nullable();
            $table->string('bloque', 2)->nullable();
            $table->string('escalera', 2)->nullable();
            $table->smallInteger('piso')->nullable();
            $table->string('puerta', 4)->nullable();
            $table->integer('codigopais');
            $table->string('cp');
            $table->string('pais', 25);
            $table->string('provincia', 25);
            $table->string('localidad');
            $table->string('iban');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('proveedores');
    }

}
