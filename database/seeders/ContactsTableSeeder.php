<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'nom' => 'Marie Durand',
                'prenom' => 'Sophie',
                'email' => 'mariedurand@example.com',
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac lectus sed orci maximus vestibulum. Duis sit amet ligula eget eros pharetra bibendum. Maecenas sit amet magna nec eros luctus suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget mi non quam egestas tincidunt. Morbi euismod augue at metus tincidunt, sed maximus quam semper. Donec non est eget elit tincidunt tincidunt. Sed velit leo, posuere ac enim quis, semper varius quam. Suspendisse potenti. Sed id enim nec quam ullamcorper hendrerit.",
                'telephone' => '0556213225'

            ],
            [
                'nom' => 'Azul Fellawen',
                'prenom' => 'Sophie',
                'email' => 'Azul@example.com',
                'message' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac lectus sed orci maximus vestibulum. Duis sit amet ligula eget eros pharetra bibendum. Maecenas sit amet magna nec eros luctus suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget mi non quam egestas tincidunt. Morbi euismod augue at metus tincidunt, sed maximus quam semper. Donec non est eget elit tincidunt tincidunt. Sed velit leo, posuere ac enim quis, semper varius quam. Suspendisse potenti. Sed id enim nec quam ullamcorper hendrerit.",
                'telephone' => '0556213225'

            ],
        ]);
    }
}
