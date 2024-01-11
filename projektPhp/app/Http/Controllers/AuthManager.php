<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;


class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function register(){
        return view('register');
    }

    function profile()
    {
       
        if (Auth::check()) {
            
            $user = Auth::user();
            $notes = $user->notes; 
    
           
            return view('profile', compact('user', 'notes'));
        }
    
       
        return redirect()->route('login')->with('error', 'Please log in to view your profile.');
    }
    


    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credenitals =$request->only('email', 'password');
        if(Auth::attempt($credenitals)){
            return redirect()->intended('profile');
        }
        return redirect(route('login'))->with('error', "Login details are not valid");
    }



    function registerPost(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request -> name ;
        $data['email'] = $request -> email ;
        $data['password'] =Hash::make( $request -> password );
        $user = User::create($data);

        if(!$user){
            return redirect(route('register'))->with('error', "Registration failed try again");

        }
        return redirect(route('login'))->with('success', "Everything good");


    }

    public function logout()
{
    Auth::logout();
    return redirect(route('login'));
}



}
