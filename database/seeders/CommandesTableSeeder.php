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
                'message' => 'azul fellawen',
                'telephone' => '0123456789',
                'email' => 'jeandupont@example.com',
                'wilaya' => 'Alger',
                'ville'  => 'Souidania',
                'code-postale' => '16097',
                'date_commande' => date('Y-m-d'), // Today's date
                'montant_total' => 40.50,
                'statut' => 'En cours'
            ],
        ]);
    }
}
