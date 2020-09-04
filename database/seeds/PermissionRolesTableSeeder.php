<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 3
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 2
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 3
        ]);

    }
}
