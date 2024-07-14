<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
public function run()
{
    $categories = [
        'Fiction',
        'Non-Fiction',
        'Science Fiction',
        'Fantasy',
        'Mystery',
        'Romance',
        'History',
        'Biography',
    ];

    foreach ($categories as $category) {
        DB::table('categories')->insert([
            'nom' => $category,
        ]);
    }
}
}
