<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DB;
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
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(PublicationCategorySeeder::class);
        $this->call(PublicationSeeder::class);
        $this->call(ContentSeeder::class);
    }
}
