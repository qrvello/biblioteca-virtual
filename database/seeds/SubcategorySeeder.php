<?php

use App\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sub Categorias de Literatura
        DB::table('subcategories')->insert([
            'title' => 'Poesía',
            'category_id' => '1',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Historietas',
            'category_id' => '1',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Cuentos',
            'category_id' => '1',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Novelas',
            'category_id' => '1',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Juvenil',
            'category_id' => '1',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Teatro',
            'category_id' => '1',
        ]);

        //Sub Categorias de Historia
        DB::table('subcategories')->insert([
            'title' => 'Biografías',
            'category_id' => '2',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Argentina y Americana',
            'category_id' => '2',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Antigua y Media',
            'category_id' => '2',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Moderna y Contemporánea',
            'category_id' => '2',
        ]);

        //Sub Categorias de Cs Naturales
        DB::table('subcategories')->insert([
            'title' => 'Física',
            'category_id' => '3',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Química',
            'category_id' => '3',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Biología',
            'category_id' => '3',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Salud',
            'category_id' => '3',
        ]);
            
        //Sub Categorias de Geografia
        DB::table('subcategories')->insert([
            'title' => 'Argentina',
            'category_id' => '4',
        ]);

        DB::table('subcategories')->insert([
            'title' => 'Mundial Contemporanea',
            'category_id' => '4',
        ]);
    
        //Sub Categorias de Cs Sociales
        DB::table('subcategories')->insert([
            'title' => 'Filosofía',
            'category_id' => '5',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Psicología',
            'category_id' => '5',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Educación',
            'category_id' => '5',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Economía',
            'category_id' => '5',
        ]);

        //Sub Categorias de Arte
        DB::table('subcategories')->insert([
            'title' => 'Música',
            'category_id' => '6',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Plástica',
            'category_id' => '6',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Fotografía',
            'category_id' => '6',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Dansa',
            'category_id' => '6',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Deportes',
            'category_id' => '6',
        ]);

        //Sub Categorias de Tecnologias
        DB::table('subcategories')->insert([
            'title' => 'Transportes',
            'category_id' => '7',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Informática',
            'category_id' => '7',
        ]);
        DB::table('subcategories')->insert([
            'title' => 'Inventos',
            'category_id' => '7',
        ]);

    
    
    }
}
