<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseCreateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_the_purchase_on_successfully_creating_a_new_purchase()
    {
        $data = [
            'client_address' => 'Aguamarina',
            'client_name' => 'Yen',
            'client_lastname' => 'Colon',
            'client_phone' => '412499273',
            'products' => [
                [
                    "id" => factory(\App\Product::class)->create()->id,
                    "quantity" => 1
                ]
            ]
        ];

        $response = $this->postJson('/api/purchase', $data);

        $response->assertStatus(200)
            ->assertJson([
                'purchase' => [
                    'client_address' => 'Aguamarina',
                    'client_name' => 'Yen',
                    'client_lastname' => 'Colon',
                    'client_phone' => '412499273',
                ]
            ]);
    }

    /** @test */
    public function it_returns_appropriate_field_validation_errors_when_creating_a_new_puchase_with_invalid_inputs()
    {
        $data = [
            'client_address' => '',
            'client_name' => '12345',
            'products' => 123
        ];

        $response = $this->postJson('/api/purchase', $data);

        $response->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                'errors' => [
                    'client_address' => ['Address is required'],
                    'client_name' => ['Name must be only letters'],
                    'products' => ['Products must be an Array', 'Products must be at least 1']
                ]
            ]);
    }
}
