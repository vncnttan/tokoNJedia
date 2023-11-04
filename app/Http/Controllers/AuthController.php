<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('pages.forms.login');
    }
    public function registerPage(){
        return view('pages.forms.register');
    }
    public function login(){

    }
    public function register(){

    }
}
