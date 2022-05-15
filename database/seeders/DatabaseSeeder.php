<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Menu::factory(10)->create();
    }
}