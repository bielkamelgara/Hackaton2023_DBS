<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sectors = new Sector();
        $sectors->name='INDUSTRIAL';
        $sectors->description='ESTE ES UN SECTOR';
        $sectors->save();

        $sectors2= new Sector();
        $sectors2->name='SERVICIO';
        $sectors2->description='ESTE ES OTRO SECTOR';
        $sectors2->save();

        
    }
}
