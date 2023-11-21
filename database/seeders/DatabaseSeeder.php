<?php

namespace Database\Seeders;

use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
        ]);
    }
}
