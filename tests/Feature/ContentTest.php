<?php

namespace Tests\Feature;

use App\Category;
use App\Content;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function muestra_el_contenido_de_la_tabla_contents()
    {
        // $this->withoutExceptionHandling();

        factory(Category::class)->create();

        factory(User::class)->create();

        factory(Content::class)->create([
            'title' => 'harry potter',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        $this->get('/content')
            ->assertStatus(200)
            ->assertSee('harry potter');
    }
}
