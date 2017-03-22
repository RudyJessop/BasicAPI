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
    }

    /**
     * Gets the Auth User
     * @return [type] [description]
     */
    public function login(Request $request, User $user){
        //TODO: Recieving JWT



        // Input Values
        $un = $request->input('username');
        $pw = $request->input('password');

        // Query User Object
        $query = $user->username($un);

        // Validation, response and catching errors
        try{
            if($query && password_verify($pw, $query->password)){
            return $this->jwt->buildJWTtoken($query->id, $query->toArray());
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
                    'message' => 'Couldnt find token'
                ]
            ], 500);
        }


    }


}