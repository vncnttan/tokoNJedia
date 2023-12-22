<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginPage(){
        return view('pages.forms.login');
    }
    public function registerPage(){
        return view('pages.forms.register');
    }
    public function login(Request $request){
        $messages = [
            'email.required' => 'All Fields Must Be Filled',
            'password.required' => 'All Fields Must Be Filled',
        ];
        $validate =  Validator::make($request->all(),[
            'email' => ['required'],
            'password' => ['required']
        ], $messages);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $credential = $request->only('email', 'password');
        $isLogin = Auth::attempt($credential);
        if($isLogin){
            return redirect('/');
        }
        return redirect()->back()->withErrors(['auth' => 'Invalid Credential']);

    }
    public function register(Request $request){
        $messages = [
            'email.required' => 'All Fields Must Be Filled',
            'email.unique' => 'Email Has Already Been Taken',
            'email.ends_with' => 'Email Must Ends With .com',
            'email.doesnt_start_with' => 'Email Must Not Start With .com',
            'password.required' => 'All Fields Must Be Filled',
            'password.regex' => 'Password Must Contain At Least 1 Lowercase, 1 Uppercase, 1 Number',
            'password.min' => 'Password Must Be At Least 5 Characters Long',
            'password.max' => 'Password Must Not Be Longer Than 20 Characters',
            'username.unique' => 'Username Has Already Been Taken',
            'username.required' => 'All Fields Must Be Filled',
        ];

        $validate = Validator::make($request->all(), [
            'username' => ['required', 'unique:users,username'], // 'unique:users,username
            'email' => ['required', 'unique:users,email', 'ends_with:.com', 'doesnt_start_with:.com'],
            'password' => ['required',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]/',
            'min:5',
            'max:20'
            ]
        ], $messages);

        if($validate->fails()){
//            toastr()->error($validate->messages()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $user = new User();
        $user->id = Str::uuid();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        $user->save();
        toastr()->success('Register Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return redirect('/login');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
