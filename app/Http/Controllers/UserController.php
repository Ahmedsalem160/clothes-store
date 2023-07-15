<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //Auth User
    public function login(){
        return view('login');
    }
    public function postLogin(Request $req){
       // dd($req);
        if (!Auth::Attempt($req->except('_token'))) {
            return redirect()->back()->with($req->except('password'));
        }
        return redirect()->route('hello');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
