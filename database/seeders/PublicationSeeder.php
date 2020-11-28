<?php

namespace Database\Seeders;

use App\Publication;
use Illuminate\Database\Seeder;
class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publication::class, 100)->create();
    }
}
