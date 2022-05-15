<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    public function run()
    {
        Menu::factory(10)->create();
    }
}