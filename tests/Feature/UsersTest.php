<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /** @test */
    public function register_test()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

        $response->assertSee('Registrarse');
    }

    /** @test */
    public function login_test()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

        $response->assertSee('Iniciar sesión');
    }
}
