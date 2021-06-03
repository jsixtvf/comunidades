<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunidad_Proveedor;

class ComunidadProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad_Proveedor::factory()
                ->count(15)
                ->create();
    }
}
