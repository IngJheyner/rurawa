<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartmentsAndCitiesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $department = Department::firstOrCreate([
            'name' => $row['department'],
            'code_divipola' => $row['code_department'],
        ]);

        return new City([
            'name' => $row['city'],
            'code_divipola' => $row['code_city'],
            'department_id' => $department->id,
        ]);
    }
}
