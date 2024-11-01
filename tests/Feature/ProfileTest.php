<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'first_name' => 'Test User2',
                'last_name' => 'Test User2',
                'phone' => '+7 924 000 0001',
                'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Test User2', $user->first_name);
        $this->assertSame('Test User2', $user->last_name);
        $this->assertSame('+7 924 000 0001', $user->phone);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }
}
