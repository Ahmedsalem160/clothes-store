<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        // $this->middleware('auth:admin-api');
    }


    public function login()
    {

       $credentials = request(['email', 'password']);

        if (! $token = Auth::guard('admin-api')->attempt($credentials) ) {
            return returnError(401, 'Unauthorized');

        }

        return returnData('token', $token, "Welcome To You");
    }
}
