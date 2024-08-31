<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|string|max:30|unique:user_account',
            'email' => 'required|string|email|max:30|unique:user_account',
            'password' => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user_id = $this->generateUserId();

        return DB::transaction(function () use ($user_id, $data) {
            $api_token_controller = new ApiTokenController;
            $api_token = Str::random(64);
            $hashedToken = hash('sha256', $api_token);

            $user = User::create([
                'user_id' => $user_id,
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'api_token' => $hashedToken,
            ]);

            $api_token_controller->createApiToken($hashedToken);

            return $user;
        });
    }

    private function generateUserId()
    {
        // Find the maximum numeric part of user_id from the database
        $maxNumericId = DB::table('user_account')
            ->select(DB::raw('MAX(CAST(SUBSTRING(user_id FROM 1 FOR 4) AS INTEGER)) AS max_id'))
            ->value('max_id');

        // Increment the numeric part by 1
        $newNumericId = $maxNumericId ? $maxNumericId + 1 : 1;

        // Generate a random string of 8 characters to append
        $randomString = strtoupper(Str::random(8));

        // Combine the numeric part and random string to create the new user_id
        return str_pad($newNumericId, 4, '0', STR_PAD_LEFT).$randomString;
    }
}
