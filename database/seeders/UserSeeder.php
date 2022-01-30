<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //estas son mis credenciales
        User::create([
            'name' => 'Luis Leon',
            'email' => 'luis@correo.com',
            'password' => bcrypt('123456789')
        ]);

        //ahora hago uso del factory de User
        User::factory(99)->create();
    }
}
