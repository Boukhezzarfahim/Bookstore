<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fahim',
                'email' => 'Fahim@gmail.com',
                'password' => Hash::make('123456789.'), // Assurez-vous que le mot de passe est hashé
            ],
          
        ]);
    }

}