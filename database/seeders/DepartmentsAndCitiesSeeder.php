<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Imports\DepartmentsAndCitiesImport;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentsAndCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new DepartmentsAndCitiesImport, 'database/seeders/DepartmentsAndCities.xlsx');
    }
}
