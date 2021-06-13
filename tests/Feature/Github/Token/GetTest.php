<?php

namespace Tests\Feature\Github\Token;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTest extends TestCase
{
    /**
     * Test the GET github token API for an authenticated user.
     */
    public function testGetGithubToken()
    {
        $user = $this->createAuthenticatedUser();

        $response = $this->getJson('/api/github/token');

        $response
            ->assertOk()
            ->assertJson([
                'github_token' => $user->github_token,
            ]);
    }
}
