<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function index(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response(['message'=>'The email or password you entered isn’t connected to an account.'], 404);
        }
        $token = $user->createToken('vuebayapi')->plainTextToken;
        $response = [
            'user' => $user,
            'token'=> $token
        ];
        return response($response, 201);
    }
    
    
}
