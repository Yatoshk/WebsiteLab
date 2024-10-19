<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function posts()
    {
        return view('posts');
    }
    public function entry()
    {
        return view('entry');
    }
    public function registration()
    {
        return view('registration');
    }
    public function registration_check(Request $request)
    {
        $valid = $request->validate([
            'login' => 'required|min:4|max:100',
            'email' => 'required|min:4|max:100',
            'password' => 'required|min:4|max:100',
            'repeatePassword' => 'required|min:4|max:100',
            'username' => 'required|min:4|max:100',
        ]);
        
        $newUser = new UsersModel();
        $newUser->login = $request->input('login');
        $newUser->password = $request->input('password');
        $newUser->email = $request->input('email');
        $newUser->username = $request->input('username');

        $newUser->save();

        return redirect()->route('entry');
    }
}
