<?php

use Illuminate\Database\Seeder;
use App\PublicationCategory;
class PublicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicationCategory::create([
            'name' => 'Noticias escolares',
        ]);
        PublicationCategory::create([
            'name' => 'Efemérides',
        ]);
        PublicationCategory::create([
            'name' => 'Notas periodísticas',
        ]);
    }
}
