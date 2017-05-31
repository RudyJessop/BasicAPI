<?php

namespace App\Http\Controllers\Auth;

use App\User;
use CTL\JWTBase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
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
     * Gets the Auth User
     * @return void
     */
    public function login(Request $request, User $user){
        //TODO: Recieving JWT
        $token = $this->jwt->parseJWTClaim($request->header('x-access-token') );
        $un = json_decode(json_encode($token['username']), true);
        $pw = json_decode(json_encode($token['password']), true);


        // Query User Object
        $query = $user->username($un);

        // Validation, response and catching errors
        try{
            if($query && password_verify($pw, $query->password)){

            $token = $this->jwt->buildJWTtoken($query->id, $query->toArray());

            return response()->json([
                'success' => [
                    'message' => 'Successful Login',
                    'Token' => $token,
                ]
            ],200);
            }else{
                return response()->json([
                    'error' =>[
                        'message' => 'Not Authenticated',
                        'code' => '5'
                    ]
                ], 401);
            }// Else
        }catch(\Exception $e){
            return response()->json([
                'error' =>[
                    'message' => 'Internal Server Error',
                    'code' => '11'
                ]
            ], 500);
        }


    }


}