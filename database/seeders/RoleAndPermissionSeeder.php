<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::findOrCreate(RolesEnum::Admin->value, 'web');

        $farmer = Role::findOrCreate(RolesEnum::Farmer->value, 'web');

        $company = Role::findOrCreate(RolesEnum::Company->value, 'web');
    }
}
