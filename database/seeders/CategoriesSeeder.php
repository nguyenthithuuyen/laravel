<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category= new Category();
        $category->name='Lap trinh PHP';
        $category->save();


        $category= new Category();
        $category->name='Lap trinh java';
        $category->save();

    }
}
