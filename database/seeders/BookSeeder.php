<?php

namespace Database\Seeders;

use Database\Factories\BookFactory;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookFactory::new()->count(10)->create();
    }
}
