<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                'users' => User::orderBy('username')
                ->filter(request(['search', 'admin']))
                ->simplePaginate(8)
            ]);
        } else {
            return back();
        }
    }

    //Show user account
    public function account() {
        $userId = \Auth::id();
        
        return view('users.account', [
            'user' => User::find($userId)
        ]);
    }

    //Add or remove admin rights
    public function make_admin(Request $request, $user) {
        $admin = $request->validate([
            'admin' => 'required'
        ]);

        User::where('id', $user)->update($admin);

        return back();
    }
  
    //Update username
    public function change_name(Request $request, $user) {
        
        $request->validate([
            'username' => ['required', 'min:3', 'unique:users,username'],
            'password' => 'required'
        ],
        [
            'username.min' => 'Ditt användarnamn är för kort!',
            'username.unique' => 'Det här användarnamnet är upptaget!',
            'password.required' => 'Ange lösenord'
        ]);

        if(!Hash::check($request['password'], auth()->user()->password)){
            return back()->with("error");
        }

        User::where('id', $user)->update([
            'username' => $request['username']
        ]);
       
        return back()->with("success");
    }

    //Update password
    public function change_password(Request $request, $user) {
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'confirmed', 'min:6']
        ],
        [
            'old_password.required' => 'Ange lösenord',
            'new_password.required' => 'Ange ett nytt lösenord',
            'new_password.confirmed' => 'Lösenordet matchar inte',
            'new_password.min' => 'Lösenordet måste vara minst 6 tecken'
        ]);
    
        if(!Hash::check($request['old_password'], auth()->user()->password)){
            return back()->with("error");
        }
    
        User::where('id', $user)->update([
            'password' => bcrypt($request['new_password'])
        ]);
        
        return back()->with("success");
    }



    //Delete user account
    public function destroy(User $user) {
        $user->delete();
        return back();
    }
    
}
