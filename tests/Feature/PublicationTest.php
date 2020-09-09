<?php

namespace Tests\Feature;

use App\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function muestra_el_contenido_de_la_pagina_publicaciones()
    {
        // $this->withoutExceptionHandling();
        factory(Publication::class)->create([
            'title' => 'harry potter'
        ]);

        $this->get('/publicaciones')
            ->assertStatus(200)
            ->assertSee('harry potter');
    }

}
