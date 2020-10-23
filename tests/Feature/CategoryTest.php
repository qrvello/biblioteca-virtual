<?php

namespace Tests\Feature;
use App\Category;
use App\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function muestra_el_listado_de_categorias()
    {
        // $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();
        $this->get('/categorias')
        ->assertStatus(200)
        ->assertSee($category->title)
        ->assertSee($category->description);
    }

    /** @test */
    public function muestra_el_listado_de_contenidos_de_una_categoria()
    {
        // $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();
        $content = factory(Content::class)->create([
            'category_id' => $category->id,
        ]);
        $this->get('categoria/'.$category->id)
            ->assertStatus(200)
            ->assertSee($category->title)
            ->assertSee($category->description)
            ->assertSee($content->title)
            ->assertSee($content->author)
            ->assertSee($content->description)
            ->assertSee($content->matter);
    }
}
