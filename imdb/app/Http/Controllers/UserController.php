<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show register form
    public function register() {
        return view('users.register');
    }
    
    //Store user data and login new user
    public function store(Request $request) {
        $formData = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'min:3', 'unique:users,username'],
            'password' => ['required', 'confirmed', 'min:6']
        ],
        [
            'email.required' => 'Ange en giltig email-adress',
            'email.email' => 'Ange en giltig email-adress',
            'email.unique' => 'Den här email-adressen är redan registrerad',
            'username.required' => 'Välj ett användarnamn',
            'username.min' => 'Ditt användarnamn är för kort!',
            'username.unique' => 'Det här användarnamnet är upptaget!',
            'password.required' => 'Välj ett lösenord',
            'password.confirmed' => 'Lösenordet överensstämmer inte',
            'password.min' => 'Lösenordet måste vara minst 6 tecken'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/');
    }
    
    //Log out user
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    //Show login form
    public function login() {
        return view('users.login');
    }
    

    //Validate and log in
    public function authenticate(Request $request) {
        $formData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Fel',
            'password.required' => 'Fel'
        ]);

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect('/');

        } 

        return back()->withErrors(['username' => 'Fel!']);
    }

    //Show manage users page
    public function manage() {
        $userId = \Auth::id();
        $user = User::find($userId);

        if($user->admin == true) {
            return view('users.manage', [
                'users' => User::all()->sortBy('username')
            ]);
        } else {
            return back();
        }
    }


    
}
