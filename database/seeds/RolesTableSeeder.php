<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'slug' => 'admin',
            'special' => 'all-access'
        ]);

        Role::create([
            'name' => 'customer',
            'slug' => 'customer'
        ]);

        Role::create([
            'name' => 'employee',
            'slug' => 'employee'
        ]);
    }
}
