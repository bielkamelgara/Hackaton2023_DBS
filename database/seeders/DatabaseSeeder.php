<?php

namespace Database\Seeders;
use App\Models\Category;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

     // Seed the application's database.

    public function run()
    {
        $this->call(SectorSeeder::class);
        $this->call(CategorySeeder::class);
        /*
       $categories = new Category();
       $categories->name_category = "Esta es una categoría";
       $categories->save();

/*
       $categories2= new Category();
       $categories2->name_category= 'Esta es otra categoría';
       $categories2->save();
       */
    }



}
