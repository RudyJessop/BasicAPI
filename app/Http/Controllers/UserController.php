<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')
    }

    /**
     * All users response
     * @return [type] [description]
     */
    public function index(){
        $users =  User::all();

        if(!$users){
            return response()->json([
                'error' => [
                    'message'=>'No Users loaded',
                    'code' => '1'
                ]
            ], 404);
        }


        return response()->json([
            'data' => [
                'user' => $users->toArray()
            ]
        ], 200);
    }

    /**
     * Specific user response
     * @return [type] [description]
     */
    public function show($id){
        $users = User::find($id);

        if(!$users){
            return response()->json([
                'error' =>[
                    'message' => 'User not found',
                    'code' => '2'
                ]
            ], 404);
        }

        return response()->json([
            'data' => [
                'user' => $users->toArray()
            ]
        ], 200);
    }

    /**
     * Deleting Specific User Response
     * @return [type] [description]
     */
    public function destroy(){

    }
}
