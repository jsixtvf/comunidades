<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'apellido1' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'dni' => $this->faker->unique()->dni(), 
            'telefono' => $this->faker->randomNumber(9, true), //$this->faker->phoneNumber,
            'calle' => $this->faker->streetName(),
            'portal' => $this->faker->buildingNumber(),
            'bloque' => $this->faker->numberBetween(1, 10),
            'escalera' => $this->faker->numberBetween(1, 10),
            'piso' => $this->faker->numberBetween(1, 30),
            'puerta' => $this->faker->numberBetween(1, 1000),
            'cp' => '07' . $this->faker->randomNumber(3, true),
            'pais' => $this->faker->country(),
            'provincia' => $this->faker->community(),
            'localidad' => $this->faker->asciify()
            
            
            /*

            $gender = $this->$faker->randomElement(['male', 'female']),
            'tratamiento' => $this->faker->title($gender), //($gender = null|'male'|'female')

            'first_name' => function (array $user) {
                return $faker->firstName($user['gender']);
                },
         
            'name' => $this->faker->firstName($gender),
            'apellido1' => $this->faker->lastName,
              
            */

            
        
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
