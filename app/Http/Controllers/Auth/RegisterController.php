<?php

namespace App\Http\Controllers\Auth;

use App\User;
use CTL\JWTBase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{

    protected $jwt;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTBase $jwt)
    {
        $this->jwt = $jwt;
        $this->middleware('auth');
    }

    /**
     * Registers New Users
     * @param  Request $request
     * @param  User    $user
     * @return void
     */
    public function register(Request $request, User $user){
        $token = $this->jwt->parseJWTClaim($request->header('x-access-token') );
        $register = json_decode(json_encode($token['register']), true);

        try{
            $user->create($register);

            return response()->json([
              'success' => [
                'message' => 'User Created Successfuly',
                'code' => '10'
              ]
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => 'Error in Creating User',
                    'info' => 'username or email already registered',
                    'code' => '9'
                ]
            ], 500);
        }
    }
}