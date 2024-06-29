<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelRecords;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Admin::factory()->create();

    }
}
