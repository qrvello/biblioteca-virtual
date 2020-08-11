<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function index_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


}
