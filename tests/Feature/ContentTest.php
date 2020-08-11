<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    /** @test */
    public function content_test()
    {
        $response = $this->get('/content');

        $response->assertStatus(200);

        $response->assertSee('Contenido');
    }
}
