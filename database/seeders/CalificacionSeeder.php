<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calificacion;

class CalificacionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $calificaciones = ['Pésima', 'Mala', 'Normal', 'Buena', 'Excelente'];

        foreach ($calificaciones as $calificacion) {
            Calificacion::create([
                'nombreCalificacion' => $calificacion,
            ]);
        }
    }

}
