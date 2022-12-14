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
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(BookCategorySeeder::class);
    }
}
