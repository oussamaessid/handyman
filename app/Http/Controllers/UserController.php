<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role_as' => $request->role_as ?? 'admin',
        ]);

        $result= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_as' => $request->role_as ?? 'admin',
        ]);
      //  $token = $user->createToken('myapptoken')->plainTextToken;

      //  $response = [
      //      'user' => $user,
     //      'token' => $token
      //  ];

        return $result;
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($fields)){
            $user = Auth::user();
            $token = md5( time() ).'.'.md5($request->email);
            $user->forceFill([
                'api_token'=>$token,
            ])->save();
            return response()->json([
                'token'=>$token
            ]);

        }

        return response()->json([
              'message'=>'the producted credentialsdo not much '
        ]);

        }

        public function logout(Request $request) {
            $request->user()->forceFill([
                'api_token'=> null,
            ])->save();

            return response()->json(['message'=>'success' ]);
        }


}
