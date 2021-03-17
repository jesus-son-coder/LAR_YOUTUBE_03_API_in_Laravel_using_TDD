<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function can_create_a_product()
    {
        // Given
            // "given" : Pour créer un produit, l'utilisateur doit être authentifié.

        // When
            // "when" : Quand l'utilisateur réalise un "POST Request", il créer un produit.

            $response = $this->json('POST', '/api/products', [
                'name' => $name = $this->faker->company,
                'slug' => str_slug($name),
                'price' => $price = random_int(10,100)
            ]);


        // Then
            // "then" : Il faut s'assurer que le produit créé par l'utilisateur existe.

            $response->assertJsonStructure([
                'id', 'name', 'slug', 'price', 'created_at'
            ])
            ->assertJson([
                'name' => $name,
                'slug' => str_slug($name),
                'price' => $price
            ])
            ->assertStatus(201);

            $this->assertDatabaseHas('products', [
                'name' => $name,
                'slug' => str_slug($name),
                'price' => $price
            ]);

    }
}

