<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $categories= new Category();
            $categories->name_category= 'Bisutería';
            $categories->id_sector=1;
            $categories->save();

            $categories= new Category();
            $categories->name_category= 'Mecánico';
            $categories->id_sector=2;
            $categories->save();
    }
}
