<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        }


        public function login(){
        return view('Auth.login');

    }


        public function loginCheck(Request  $request){
        $user=$request->validate([
           'email'=>'required|email',
           'password'=>'required|min:6'
        ]);
       $checked= auth()->login($user);
        dd($checked);
        }

        public function create(){
            return view('Auth.register');

        }
        public function store(Request $request ){
         $validated=   $request->validate([
                'name'=>'required|max:40',
                'username'=>'required|max:40|unique:users,username',
                'email'=>'required|max:60|unique:users,email'
                ,'password'=>'required|min:6|max:255 '
            ]);

            User::create($validated);
            //flash a message to a session
           return redirect('/posts')->with('success','User created successfully');
        }
}
