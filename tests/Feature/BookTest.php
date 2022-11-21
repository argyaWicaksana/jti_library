<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_admin_can_see_book_page()
    {
        $admin = User::factory()->create(['is_admin' => 1]);

        $response = $this->actingAs($admin)->get('/book');
        $response->assertStatus(200);
    }

    public function test_admin_can_add_book_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/book', [
            'title' =>'ilham diary',
        ]);
        $this->assertEquals(1, User::count());
        $response->assertStatus(302);
    }

    public function test_admin_can_update_book_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $book = Book::factory()->create();
        $this->assertEquals(1, Book::count());
        $response = $this->actingAs($admin)->put('/book/'. $book->id, [
            'title' =>'ilham diary',
        ]);
        $response->assertStatus(302);
    }

    public function test_admin_can_delete_student_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $book = Book::factory()->create();
        $this->assertEquals(1, Book::count());
        $response = $this->actingAs($admin)->delete('/book/'. $book->id);
        $response->assertStatus(302);
        $this->assertEquals(0, Book::count());
    }
}
