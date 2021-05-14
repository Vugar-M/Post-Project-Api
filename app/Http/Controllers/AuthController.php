<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user=new User();
        $user->email=$request->input('email');
        $user->name=$request->input('name');
        $user->password=Hash::make($request->input('password'));
        $user->isAdmin=$request->input('isAdmin');
        $user->save();

        $token=$user->createToken('post-token')->plainTextToken;
        return response(['user'=>$user,'token'=>$token],201);
    }
}
