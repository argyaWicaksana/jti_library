<?php

namespace Tests\Feature;

use App\Models\Borrow_transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;
    public function test_see_cart_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/cart');
        $response->assertStatus(200);
    }

    public function test_can_store_data()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/borrow/' . $user->id, [
            'amount' => 5,
            'date_borrow' => date('m-d-y'),
            'date_returndata' => date('m-d-y'),
            'status_id' => 2,
        ]);

        $response->assertStatus(302);
    }
}
