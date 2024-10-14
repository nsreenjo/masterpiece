<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mall;

class MallSeeder extends Seeder
{
    public function run()
    {
        Mall::factory()->count(10)->create(); 
    }
}
