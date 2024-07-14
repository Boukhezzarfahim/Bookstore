<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(AuteursTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ReductionTableSeeder::class);
        $this->call(CommandesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(EditeursTableSeeder::class);
        $this->call(LivresTableSeeder::class);
        $this->call(LigneCommandeTableSeeder::class);
        $this->call(UsersTableSeeder::class);


       
    }
}
