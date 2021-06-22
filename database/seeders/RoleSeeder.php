<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


        Role::create([
            'role' => 'super',
            'descripcion' => 'Superusuario de la aplicación',
        ]);
        
        Role::create([
            'role' => 'admin',
            'descripcion' => 'Administrador de una comunidad',
        ]);
        
        Role::create([
            'role' => 'guest',
            'descripcion' => 'Propietario de una comunidad',
        ]);
    }

}
