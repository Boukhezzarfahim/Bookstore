<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editeurs')->insert([
            [
                'nom_edition' => 'J.R.R. Tolkien Editions'
            ],
            [
                'nom_edition' => 'Folio'
            ],
        ]);
    }
}
