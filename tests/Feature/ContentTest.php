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


}
