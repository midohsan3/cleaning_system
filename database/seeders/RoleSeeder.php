<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'HR',
            'Accountant',
            'Booking',
            'Marketing',
            'Cleaner',
            'Customer',

        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
