<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(
            [
                [
                    'name'       => 'PHP',
                    'slug'       => 'php',
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
                [
                    'name'       => 'Laravel',
                    'slug'       => 'laravel',
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
                [
                    'name'       => 'JavaScript',
                    'slug'       => 'javascript',
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
                [
                    'name'       => 'Python',
                    'slug'       => 'python',
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
                [
                    'name'       => 'Data Structure and Algorithm',
                    'slug'       => 'data-structure-algorithm',
                    'created_by' => 1,
                    'updated_by' => 1,
                ],
            ]
        );
    }
}
