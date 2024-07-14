<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auteurs')->insert([
            [
                'nom' => 'Tolkien',
                'prenom' => 'John Ronald Reuel',
                'sexe' => 'H' // H pour Homme
            ],
            [
                'nom' => 'Rowling',
                'prenom' => 'Joanne',
                'sexe' => 'F' // F pour Femme
            ],
        ]);
    }
}
