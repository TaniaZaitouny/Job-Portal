<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'Healthcare'],
            ['category' => 'IT'],
            ['category' => 'Real Estate'],
            ['category' => 'Retail'],
            ['category' => 'Education'],
            ['category' => 'Entertaiment and Sports'],
            ['category' => 'Legal'],
            ['category' => 'Transportation'],
            ['category' => 'Social Services'],
            ['category' => 'Sales and Marketing'],
            ['category' => 'Management'],
            ['category' => 'Businness and Finance'],
            ['category' => 'Architecture and Engineering'],
            ['category' => 'Arts and Design'],
            ['category' => 'Construction'],
        ];

        DB::table('categories')->insert($categories);
    }
}
