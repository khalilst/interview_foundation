<?php

namespace App\Exceptions\Github;

use Exception;

class InvalidTokenException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json(['message' => 'Your Github token is invalid!'], 422);
    }
}
