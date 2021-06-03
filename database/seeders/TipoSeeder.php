<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $tipos = ['Admin. Pública', 'Telefonía', 'Agua', 'Antenas', 'Antiplaga',
            'Ascensores', 'Comunidad', 'Desatascos', 'Electricidad', 'Electricista',
            'Entidad Financiera', 'Fontanería', 'Impermeabilizaciones', 'Jardinería',
            'Jurídico', 'Limpieza', 'Piscinas', 'Porteros automáticos', 'Puertas garajes', 
            'Rehabilitación', 'Seguros'];

        foreach ($tipos as $tipo) {
            Tipo::create([
                'nombreTipo' => $tipo,
            ]);
        }
    }

}
