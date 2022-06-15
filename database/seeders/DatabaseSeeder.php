<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Open_work;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        // \App\Models\Open_work::factory(200)->create();
       

    }
}
