<?php

namespace App\Http\Middleware;

use App\Models\ApiTokensList;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['error' => 'API token not provided'], 401);
        }

        $apiToken = ApiTokensList::where('api_token', $token)->first();

        if (! $apiToken) {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        $user = User::find($apiToken->user_id);

        if (! $user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if (! $user->hasVerifiedEmail()) {
            return response()->json(['error' => 'User email not verified'], 403);
        }

        // Attach the user to the request for later use
        $request->merge(['user' => $user]);

        return $next($request);
    }
}
