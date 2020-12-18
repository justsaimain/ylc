<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'English',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, nihil'
        ]);

        Category::create([
            'name' => 'Chinese',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, nihil'
        ]);

        Category::create([
            'name' => 'Japanese',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, nihil'
        ]);
    }
}
