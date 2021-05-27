<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunidad_User;

class ComunidadUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad_User::factory()
                ->count(15)
                ->create();
    }
}
