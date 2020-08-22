<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NosotrosTest extends TestCase
{
    /** @test */
    public function devuelve_nosotros()
    {
        $response = $this->get('/nosotros')
            ->assertOk()
            ->assertSee('nosotros');
    }
}
