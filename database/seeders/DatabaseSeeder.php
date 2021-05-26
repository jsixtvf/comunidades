<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Comunidad;
use App\Models\Comunidad_User;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        
        $user= User::create([
            'name' => 'randion',
            'email' => 'randion@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('secretos'),
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secretos'),
            'remember_token' => Str::random(10),
        ]);
        
        \App\Models\Team::create([
            'name' => 'pruebas\'s Team',
            'user_id' => 2,
            'personal_team' => true,
        ]);
       
        $this->call([RoleSeeder::class]);
        \App\Models\User::factory(15)->create();
        \App\Models\Team::factory(15)->create();
        $this->call([ComunidadSeeder::class]);
        
        Comunidad_User::create([
            'comunidad_id' => 1,
            'user_id' => 2,
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //$this->call([ComunidadUserSeeder::class]);

       $miscomunidades = Comunidad::all();
       
       dd($miscomunidades);
//        foreach ($miscomunidades as $comunidad) {
//            Comunidad_User::create([
//                'comunidad_id' => $comunidad->id,
//                'user_id' => '1',
//                'role_id' => '2',
//                ]);
        }
    }
