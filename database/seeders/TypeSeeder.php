<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            ['name' => 'Horor',],
            ['name' => 'Comedy',],
            ['name' => 'Romance',],
            ['name' => 'Fiction',],
            ['name' => 'Nonfiction',],
            ['name' => 'Knowledge',],
            ['name' => 'Adventure',],
            ['name' => 'Bussiness',],
            ['name' => 'Music',],
            ['name' => 'Tesis',],
        ];

        DB::table('type')->insert($type);
    }
}
