<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
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
        // $table->string('nim');
        // $table->string('profile_picture');
        // $table->string('ktm_picture');
        // $table->string('username');
        // $table->string('password');

        $student = [
            [
                'id' => 1,
                'name' => 'Zaim Mafluki',
                'nim' => '2041720111',
                'username' => 'zaimfh1',
                'password' => 'IkhlasSabarSadar'
            ],
            [
                'id' => 2,
                'name' => 'Hasna Adila',
                'nim' => '2041720112',
                'username' => 'hasnaadila',
                'password' => 'IkhlasSabarSadar'
            ]
        ];
        
        DB::table('student')->insert($student);
    }
}
