<?php

namespace Tests\Feature\Github\Token;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * Test the storing Github Token for an athenticated user.
     */
    public function testStoreGithubToken()
    {
        $user = $this->createAuthenticatedUser();
        $github_token = Str::random(10);

        $response = $this->postJson('/api/github/token', compact('github_token'));

        $response
            ->assertStatus(200)
            ->assertJson(['status' => true]);

        $user->refresh();
        $this->assertTrue($user->github_token === $github_token);
    }

    /**
     * Test the Github Token Validation during store.
     */
    public function testStoreGitHubTokenValidation()
    {
        $user = $this->createAuthenticatedUser();

        $response = $this->postJson('/api/github/token');

        $response->assertJsonValidationErrors(['github_token' => 'required']);
    }
}
