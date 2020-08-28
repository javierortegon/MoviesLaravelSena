<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status;
        $status->name = "active";
        $status->type_status_id = 1;
        $status->save();

        $status = new Status;
        $status->name = "inactive";
        $status->type_status_id = 1;
        $status->save();

    }
}
