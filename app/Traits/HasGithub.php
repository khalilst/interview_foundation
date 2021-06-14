<?php

namespace App\Traits;

use App\Exceptions\Github\InvalidTokenException as InvalidGithubTokenException;
use Github\Client;
use GrahamCampbell\GitHub\Facades\GitHub;

trait HasGithub
{
    /**
     * The attribute to indicate that current user logged in the Github.
     *
     * @var boolean
     */
    protected $isAuthenticatedInGithub = false;

    /**
     * Log into the GitHub with the given Token.
     *
     * @return void
     */
    public function authenticateInGitHub()
    {
        if (!$this->isAuthenticatedInGithub) {
            GitHub::authenticate($this->github_token, null, Client::AUTH_ACCESS_TOKEN);

            $this->isAuthenticatedInGithub = true;
        }
    }

    /**
     * Return the user's starred repositories from GitHub.
     *
     * @param  int $page
     * @return Collection
     */
    public function getGithubStars($page)
    {
        try {
            $this->authenticateInGitHub();
            $repos = GitHub::currentUser()->starring()->all($page) ?? [];
        } catch (\Exception $e) {
            $this->isAuthenticatedInGithub = false;
            throw new InvalidGithubTokenException;
        }

        return collect($repos)->map(fn($repo) => (object) $repo);
    }

    /**
     * Update the given Github token.
     *
     * @param  string $token
     * @return bool
     */
    public function updateGithubToken($token)
    {
        return $this->update(['github_token' => $token]);
    }
}
