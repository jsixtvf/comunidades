<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProveedorFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        
        $tipos = DB::table('tipos')->pluck('id');
        $calificaciones = DB::table('calificaciones')->pluck('id');
        $figuras = DB::table('figuras')->pluck('id');
        
        return [
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'cif' => $this->faker->unique()->dni(),
            'tipo' => $this->faker->randomElement($tipos),
            'calificacion' => $this->faker->randomElement($calificaciones),
            'figura' => $this->faker->randomElement($figuras),
            'nombre' => 'C.P. ' . $this->faker->name,
            'apellido1' => $this->faker->name,
            'apellido2' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->randomNumber(9, true),
            'calle' => $this->faker->streetAddress(), //secondaryAddress(),
            'codigopais' => $this->faker->randomNumber(2, true),
            'cp' => '07' . $this->faker->randomNumber(3, true),
            'pais' => 'España',
            'provincia' => $this->faker->community(),
            'localidad' => $this->faker->asciify(),
            'iban' => $this->faker->iban('ES')
        ];
    }

}
