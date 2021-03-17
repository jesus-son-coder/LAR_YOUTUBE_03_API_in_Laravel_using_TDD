<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_create_a_product()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
