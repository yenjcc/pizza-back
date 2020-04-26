<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseShowTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_an_empty_array_of_purchase_when_no_purchases_exist()
    {
        $response = $this->getJson('/api/purchase');

        $response->assertStatus(200)
            ->assertJson([
                'purchases' => [],
            ]);
    }

    /** @test */
    public function it_returns_the_purchase()
    {
        $purchases = factory(\App\Purchase::class)->times(2)->create();

        $response = $this->getJson('/api/purchase');

        $response->assertStatus(200)
            ->assertJson([
                'purchases' => [
                    [
                        'id' => $purchases[0]->id,
                        'client_address' => $purchases[0]->client_address,
                        'client_name' =>  $purchases[0]->client_name,
                        'client_lastname' => $purchases[0]->client_lastname,
                        'client_phone' => $purchases[0]->client_phone,
                        'delivery_price' => $purchases[0]->delivery_price
                    ],
                    [
                        'id' => $purchases[1]->id,
                        'client_address' => $purchases[1]->client_address,
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_returns_the_purchase_by_id_if_valid_and_not_found_error_if_invalid()
    {
        $purchase = factory(\App\Purchase::class)->create();

        $response = $this->getJson("/api/purchase/{$purchase->id}");

        $response->assertStatus(200)
            ->assertJson([
                'purchase' => [
                    'id' => $purchase->id,
                    'client_address' => $purchase->client_address,
                    'client_name' =>  $purchase->client_name,
                    'client_lastname' => $purchase->client_lastname,
                    'client_phone' => $purchase->client_phone,
                    'delivery_price' => $purchase->delivery_price
                ]
            ]);

        $response = $this->getJson('/api/purchase/invalidinvalid');

        $response->assertStatus(404);
    }

    
}
