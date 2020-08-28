<?php

use Illuminate\Database\Seeder;
use App\TypeStatus;

class TypesStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeStatus = new TypeStatus;
        $typeStatus->id = 1;
        $typeStatus->name = "movies";
        $typeStatus->save();
    }
}
