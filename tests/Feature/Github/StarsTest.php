<?php

namespace Tests\Feature\Github;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StarsTest extends TestCase
{
    /**
     * Return a mocked and fake \Github\Api\CurrentUser::class instance.
     *
     * @return object
     */
    protected function mockedCurrentUser()
    {
        return new class {
            public function starring()
            {
                return new class {
                    public function all()
                    {

                    }
                };
            }
        };
    }

    /**
     * Test the api for getting starred repos.
     *
     * @return void
     */
    public function testGithubStarredRepos()
    {
        $this->createAuthenticatedUser();

        GitHub::shouldReceive('authenticate')->once();
        GitHub::shouldReceive('currentUser')
            ->once()
            ->andReturn($this->mockedCurrentUser());

        $response = $this->getJson('/api/github/stars');

        $response->assertOk();
    }
}
