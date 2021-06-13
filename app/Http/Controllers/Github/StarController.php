<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Http\Resources\Github\StarResource;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Return the list of the Github's starred repositories for the current user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $stars = $request->user()->getGithubStars($request->get('page', 1));

        return response()->json(StarResource::collection($stars));
    }
}
