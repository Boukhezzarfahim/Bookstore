<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commandes')->insert([
            [
                'nom' => 'Jean Dupont',
                'prenom' => 'Pierre',
                'adresse' => '1 rue de la Librairie, 75000 Paris',
                'telephone' => '0123456789',
                'email' => 'jeandupont@example.com',
                'date_commande' => date('Y-m-d'), // Today's date
                'montant_total' => 40.50,
                'statut' => 'En cours'
            ],
        ]);
    }
}
