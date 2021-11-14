<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    if (Auth::attempt($request->only('email', 'password'))) {
      $token = Auth::user()->createToken("auth_token")->accessToken;
      return response()->json(["data" => Auth::user(), "status" => true, "token"=>$token]);
    } else {
      return response()->json(["error" => "Invalid Email/Password", "status" => false]);
    }
  }
  public function logout()
  {
    Auth::logout();
  }
}
