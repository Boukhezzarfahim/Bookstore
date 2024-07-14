<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reductions')->insert([
            ['id' => 1, 'reduction' => '50'],
            ['id' => 2, 'reduction' => '25'],
            ['id' => 3, 'reduction' => '75'],
            ['id' => 4, 'reduction' => '80'],
        ]);
     
    }
}
