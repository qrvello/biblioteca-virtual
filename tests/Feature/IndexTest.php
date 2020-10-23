<?php

namespace Tests\Feature;
use App\Content;
use App\Category;
use App\Publication;
use App\PublicationCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_test()
    {
        $category = PublicationCategory::create([
            'name' => 'Efemérides'
        ]);

        $category2 = PublicationCategory::create([
            'name' => 'Notas periodísticas'
        ]);

        $category3 = PublicationCategory::create([
            'name' => 'Noticias escolares'
        ]);

        $category4 = Category::create([
            'title' => 'ciencias sociales',
            'description' => 'no se'
        ]);

        Content::create([
            'title' => 'contenido',
            'description' => 'descripcion',
            'category_id' => $category4->id
        ]);

        Publication::create([
            'title' => 'prueba',
            'description' => 'test',
            'publication_category_id' => $category->id
        ]);

        Publication::create([
            'title' => 'prueba2',
            'description' => 'test2',
            'publication_category_id' => $category2->id
        ]);

        Publication::create([
            'title' => 'prueba3',
            'description' => 'test3',
            'publication_category_id' => $category3->id
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('¡Bienvenido/a a nuestra biblioteca digital!')
            ->assertSee('prueba')
            ->assertSee('test')
            ->assertSee('prueba2')
            ->assertSee('test2')
            ->assertSee('prueba3')
            ->assertSee('test3')
            ->assertSee('contenido')
            ->assertSee('descripcion');
    }
}
