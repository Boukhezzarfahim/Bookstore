<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigneCommandeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lignes_commande')->insert([
            [
                'commande_id' => 1, // Assuming you have a command with ID 1
                'livre_id' => 1, // Assuming you have a book with ID 1
                'quantite' => 2,
                'prix_unitaire' => 22.50
            ],
            [
                'commande_id' => 1,
                'livre_id' => 2,
                'quantite' => 1,
                'prix_unitaire' => 18.00
            ],
        ]);
    }
}
