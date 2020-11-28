<?php

namespace Database\Seeders;

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Content::class, 1)->create([
            'subcategory_id' => random_int(1, 6),
            'category_id' => 1,
        ]);

        factory(Content::class, 1)->create([
            'subcategory_id' => random_int(7, 10),
            'category_id' => 2,
        ]);

        factory(Content::class, 1)->create([
            'subcategory_id' => random_int(11, 14),
            'category_id' => 3,
        ]);

    }
}
