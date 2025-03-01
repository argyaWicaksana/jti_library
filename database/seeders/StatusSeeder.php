<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['name' => 'On process',],
            ['name' => 'Booked',],
            ['name' => 'Borrowed',],
            ['name' => 'Returned',],
        ];

        DB::table('status')->insert($status);
    }
}
