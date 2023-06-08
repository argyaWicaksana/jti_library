<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PublisherSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
        ]);
    }
}
