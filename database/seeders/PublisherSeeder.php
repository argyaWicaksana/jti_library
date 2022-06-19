<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = [
            ['name' => 'Erlangga',],
            ['name' => 'Gramedia',],
            ['name' => 'Grasindo',],
            ['name' => 'Self Publish',],
            ['name' => 'Media Kita',],
            ['name' => 'Graha Ilmu',],
            ['name' => 'Salemba',],
            ['name' => 'Kawan Pustaka',],
            ['name' => 'Tiga Serangkai',],
        ];

        DB::table('publisher')->insert($publisher);
    }
}
