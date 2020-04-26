<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductShowTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_an_empty_array_of_products_when_no_products_exist()
    {
        $response = $this->getJson('/api/product');

        $response->assertStatus(200)
            ->assertJson([
                'products' => []
            ]);
    }

    /** @test */
    public function it_returns_the_products()
    {
        $products = factory(\App\Product::class)->times(2)->create();

        $response = $this->getJson('/api/product');

        $response->assertStatus(200)
            ->assertJson([
                'products' => [
                    [
                        'name' => $products[0]->name,
                        'description' => $products[0]->description,
                        'price' => $products[0]->price,
                        'image_url' => $products[0]->image_url,
                        'category_id' => $products[0]->category_id,
                        // 'created_at' =>  $products[0]->created_at->format('Y-m-d H:i:s.z'),
                        // 'updated_at' =>  $products[0]->updated_at->format('Y-m-d H:i:s.z')
                    ],
                    [
                        'name' => $products[1]->name,
                        'description' => $products[1]->description,
                    ]
                ]
                //  'productsCount' => 2
            ]);
    }

    /** @test */
    public function it_returns_the_product_by_id_if_valid_and_not_found_error_if_invalid()
    {
        $product = factory(\App\Product::class)->create();

        $response = $this->getJson("/api/product/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'product' => [
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'image_url' => $product->image_url,
                    'category_id' => $product->category_id,
                ]
            ]);

        $response = $this->getJson('/api/product/invalidinvalid');

        $response->assertStatus(404);
    }
}
