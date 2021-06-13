<?php

namespace App\Http\Controllers\Github\Token;

use App\Http\Controllers\Controller;
use App\Http\Requests\Github\TokenRequest;
use App\Http\Resources\Github\TokenResource;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Stores the given Github token for current user.
     *
     * @param  TokenRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(TokenRequest $request)
    {
        $request->user()->updateGithubToken($request->github_token);

        return $this->ok();
    }
}
