<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'admin1',
        //     'username' => 'ilham',
        //     'password' => 12345678,
        // ]);
        
        $user = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'nim' => '0000000000',
                'is_admin' => '1',
                'password' => Hash::make(12345678),
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'nim' => '1839384211',
                'is_admin' => '0',
                'password' => Hash::make(12345678),
            ],
            [
                'name' => 'Argya',
                'username' => 'argya',
                'nim' => '2141720134',
                'is_admin' => '0',
                'password' => Hash::make(12345678),
            ]
        ];
        
        foreach($user as $value){
            User::create($value);
        }
    }
}
