<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_see_student_page()
    {
        $admin = User::factory()->create(['is_admin' => 1]);

        $response = $this->actingAs($admin)->get('/student');
        $response->assertStatus(200);
    }

    public function test_admin_can_add_student_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/student', [
            'name' => 'hilda',
            'nim' => '2041720161',
            "username" => 'hildakh',
            "password" => 'hilda123',
            'is_admin' => 0,
        ]);

        $response->assertStatus(302);
    }

    public function test_admin_can_update_student_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $student = User::factory()->create();
        $response = $this->actingAs($admin)->put('/student/' . $student->id, [
            'name' => 'hidayah',
            'nim' => '2041720161',
            "username" => 'hildakh',
            "password" => 'hilda123',
            'is_admin' => 0,
        ]);
        $response->assertStatus(302);
    }

    public function test_admin_can_delete_student_data()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $student = User::factory()->create();
        $this->assertEquals(2, User::count());
        $response = $this->actingAs($admin)->delete('/student/' . $student->id);
        $response->assertStatus(302);
        $this->assertEquals(1, User::count());
    }
}
