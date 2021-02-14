<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCanCreateProduct()
    {
        $product = [
            'name' => "Product Test Name", 
            'description' => "Product Test Description", 
            'price' => 199.99, 
            'image' => null
        ];
        
        $data = ['product' => $product, 'categories' => null];

        $response = $this->json('POST', '/api/addProduct', $data);

        $response->assertStatus(201);
    }
}
