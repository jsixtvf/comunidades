<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Figura;

class FiguraSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $figuras = ['Física', 'Jurídica'];

        foreach ($figuras as $figura) {
            Figura::create([
                'nombreFigura' => $figura,
            ]);
        }
    }

}
