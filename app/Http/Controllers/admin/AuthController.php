<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends BaseController
{
    public function login(Request $request){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'User successfully logged in');
        }else{
            return $this->sendError('Unauthorised', null, 401);
        }
    }

    public function test()
    {
        $success = null;
        return $this->sendResponse($success, 'Excelente Juan Camilo');
    }
}
