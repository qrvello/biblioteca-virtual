<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Literatura',
        ]);
        DB::table('categories')->insert([
            'title' => 'Historia'
        ]);
        DB::table('categories')->insert([
            'title' => 'Ciencias Naturales'
        ]);
        DB::table('categories')->insert([
            'title' => 'Geografia'
        ]);
        DB::table('categories')->insert([
            'title' => 'Ciencias Sociales'
        ]);
        DB::table('categories')->insert([
            'title' => 'Arte'
        ]);
        DB::table('categories')->insert([
            'title' => 'Tecnologías'
        ]);
        
    }
}
