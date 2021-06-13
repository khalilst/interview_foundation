<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, WithoutMiddleware;

    /**
     * Create a user and login with that user.
     *
     * @param  array $data
     * @return User
     */
    public function createAuthenticatedUser($data = [])
    {
        $user = factory(User::class)->create($data);

        $this->be($user);

        return $user;
    }
}
