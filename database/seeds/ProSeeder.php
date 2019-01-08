<?php

use Illuminate\Database\Seeder;

class ProSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Professional::class , 5) -> create();
    }
}
