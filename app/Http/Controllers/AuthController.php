<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(){
        return view('pages.forms.login');
    }
    public function registerPage(){
        return view('pages.forms.register');
    }
    public function login(Request $request){
    }
    public function register(Request $request){

        $messages = [
            'email.required' => 'All Fields Must Be Filled',
            'email.unique' => 'Email Has Already Been Taken',
            'email.ends_with' => 'Email Must Ends With @gmail.com',
            'email.doesnt_start_with' => 'Email Must Not Start With @gmail.com',
            'password.required' => 'All Fields Must Be Filled',
            'password.regex' => 'Password Must Contain At Least 1 Lowercase, 1 Uppercase, 1 Number',
            'password.min' => 'Password Must Be At Least 5 Characters Long',
            'password.max' => 'Password Must Not Be Longer Than 20 Characters',
        ];

        $validate = Validator::make($request->all(), [
            'email' => ['required', 'unique:users,email', 'ends_with:@gmail.com', 'doesnt_start_with:@gmail.com'],
            'password' => ['required',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]+$/',
            'min:5',
            'max:20'
            ]
        ], $messages);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login');
    }
}
