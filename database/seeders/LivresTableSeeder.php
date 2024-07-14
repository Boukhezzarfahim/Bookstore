<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivresTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('livres')->insert([
            [
                'titre' => 'Le Seigneur des Anneaux',
                'image' => 'seigneur_des_anneaux.jpg', // Ajoutez une image pour ce livre
                'auteur_id' => 1,
                'ISBN' => '978-2-207-25391-7',
                'edition_id' => 1,
                'categorie_id' => 1,
                'reduction_id' => 3,
                'genre' => 'Fantasy',
                'prix' => 22.50,
                'ancien_prix' => null,
                'disponibilite' => 'disponible',
                'nouveau' => true,
                'date_publication' => '1999-02-17',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac lectus sed orci maximus vestibulum. Duis sit amet ligula eget eros pharetra bibendum. Maecenas sit amet magna nec eros luctus suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget mi non quam egestas tincidunt. Morbi euismod augue at metus tincidunt, sed maximus quam semper. Donec non est eget elit tincidunt tincidunt. Sed velit leo, posuere ac enim quis, semper varius quam. Suspendisse potenti. Sed id enim nec quam ullamcorper hendrerit.'
            ],
            [
                'titre' => 'Harry Potter à l\'école des sorciers',
                'image' => 'harry_potter.jpg', // Ajoutez une image pour ce livre
                'auteur_id' => 2,
                'ISBN' => '978-2-207-03194-9',
                'edition_id' => 2,
                'categorie_id' => 2,
                'reduction_id' => 2,
                'genre' => 'Jeunesse',
                'prix' => 18.00,
                'ancien_prix' => 12.00,
                'disponibilite' => 'disponible',
                'nouveau' => false,
                'date_publication' => '1998-10-12',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac lectus sed orci maximus vestibulum. Duis sit amet ligula eget eros pharetra bibendum. Maecenas sit amet magna nec eros luctus suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget mi non quam egestas tincidunt. Morbi euismod augue at metus tincidunt, sed maximus quam semper. Donec non est eget elit tincidunt tincidunt. Sed velit leo, posuere ac enim quis, semper varius quam. Suspendisse potenti. Sed id enim nec quam ullamcorper hendrerit.'
            ],
        ]);
    }
}