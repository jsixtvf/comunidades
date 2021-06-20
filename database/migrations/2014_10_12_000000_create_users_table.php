<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // original Randion
        Schema::create('users', function (Blueprint $table) {
            
           /* $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();*/

            $table->id();
            $table->string('name', 35);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            //$table->integer('limitMaxFreeCommunities')->default(2);
            $table->enum("tratamiento", ["Sr", "Sra"])->nullable();
            $table->string('apellido1', 30)->nullable();
            $table->string('apellido2', 30)->nullable();
            //$table->enum("Tipo", ["Fisica", "Juridica"]);
            $table->date('fecha')->nullable();
            $table->string('dni', 9)->nullable();
            $table->string('telefono', 9)->nullable();
            $table->string('calle', 30)->nullable();
            $table->string('portal', 4)->nullable();
            $table->string('bloque', 4)->nullable();
            $table->string('escalera', 4)->nullable();
            $table->string('piso', 4)->nullable();
            $table->string('puerta', 4)->nullable();
            $table->string('codigo_pais', 2)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('pais', 30);
            $table->string('provincia', 30);
            $table->string('localidad');

            $table->integer('MaxFreeCommunities')->default(env('APP_MAX_FREE_COMMUNITIES', 3));
            //$table->foreignId('current_team_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
