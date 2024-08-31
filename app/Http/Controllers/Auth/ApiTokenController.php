<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ApiTokensList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function createApiToken(string $hashedToken)
    {
        // check if the user is premium or not. number of uses will be -1 if premium. default is 3
        $no_of_uses = 3;

        ApiTokensList::Create([
            'api_token' => $hashedToken,
            'number_of_uses' => $no_of_uses,
            'created_at' => now(),
            'modified_at' => now(),
        ]);
    }

    public function updateApiToken(Request $request)
    {
        //? add the logic for checking whether the user is premium or not after updating or create another method for it to update the subs status of the user
        $new_api_token = Str::random(64);
        $hashedToken = hash('sha256', $new_api_token);

        $request->user()->forcefill([
            'api_token' => $hashedToken,
        ])->save();

        return ['token' => $new_api_token];
    }
}
