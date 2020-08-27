<?php

namespace Tests\Feature;

use App\Category;
use App\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function muestra_el_contenido_de_la_pagina_contenidos()
    {
        // $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();

        factory(Content::class)->create([
            'title' => 'harry potter',
            'category_id' => $category->id,
        ]);
        $this->get('/contenidos')
            ->assertStatus(200)
            ->assertSee('harry potter');
    }

    /** @test */
    public function muestra_el_resultado_de_la_busqueda_por_titulo()
    {
        // $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();

        $content = factory(Content::class)->create([
            'title' => 'harry potter',
            'author' => 'J. K. Rowling',
            'category_id' => $category->id,
        ]);

        $this->get('/contenidos?search=harry+potter&type=title')
            ->assertStatus(200)
            ->assertSee($category->title)
            ->assertSee($content->author)
            ->assertSee($content->editorial)
            ->assertSee($content->description)
            ->assertSee($content->matter)
            ->assertSee($content->date_published)
            ->assertSee('harry potter');
    }

    /** @test */
    public function muestra_el_resultado_de_la_busqueda_por_autor()
    {
        // $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();

        $content = factory(Content::class)->create([
            'title' => 'harry potter',
            'author' => 'J. K. Rowling',
            'category_id' => $category->id
        ]);
        $this->get('/contenidos?search=J.+K.+Rowling&type=author')
            ->assertStatus(200)
            ->assertSee($category->title)
            ->assertSee($content->author)
            ->assertSee($content->editorial)
            ->assertSee($content->description)
            ->assertSee($content->matter)
            ->assertSee($content->date_published)
            ->assertSee('J. K. Rowling');
    }

    /** @test */
    public function muestra_el_resultado_de_la_busqueda_por_editorial()
    {
        // $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();

        $content = factory(Content::class)->create([
            'editorial' => 'pepe',
            'category_id' => $category->id
        ]);
        $this->get('/contenidos?search=pepe&type=editorial')
        ->assertStatus(200)
            ->assertSee('pepe')
            ->assertSee($category->title)
            ->assertSee($content->title)
            ->assertSee($content->author)
            ->assertSee($content->description)
            ->assertSee($content->matter)
            ->assertSee($content->date_published);
    }

}
