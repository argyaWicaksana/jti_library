<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id('id');
        // $table->string('name');
        // $table->string('username');
        // $table->string('password');
        $admin = [
            ['id' => 1,
            'name' => 'Muhammad Ilham El Hakim',
            'username' => 'ilhamhakim1',
            'password' => 'IkhlasSabarSadar',
            ],

            [ 'id' => 2,
            'name' => 'Hilda Khoirotul Hidayah',
            'username' => 'hildakh1',
            'password' => 'IkhlasSabarSadar',
            ],
        ];

        DB::table('admin')->insert($admin);
    }
}
