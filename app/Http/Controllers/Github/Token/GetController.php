<?php

namespace App\Http\Controllers\Github\Token;

use App\Http\Controllers\Controller;
use App\Http\Resources\Github\TokenResource;
use Illuminate\Http\Request;

class GetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        return response()->json(new TokenResource($request->user()));
    }
}
