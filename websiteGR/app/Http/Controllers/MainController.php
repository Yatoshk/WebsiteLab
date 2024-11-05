<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Pow;
use Illuminate\Support\Facades\Auth;

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

    public function entry_check(Request $request)
    {
        $credential = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if(!Auth::attempt($credential)) {
            return back()
            ->withInput()
            ->withErrors([
                'login' => 'User not found.'    
            ]);
        }

        return redirect()->route('posts');
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
            'repeatePassword' => 'required|min:4|max:100|same:password',
            'username' => 'required|min:4|max:100|',
        ]);

        $newUser = new UsersModel();
        $newUser->login = $request->input('login');
        $newUser->role_id = 0;
        $newUser->password = Hash::make($request->input('password'));
        $newUser->email = $request->input('email');
        $newUser->username = $request->input('username');

        $newUser->save();

        return redirect()->route('entry');
    }

    public function posts_create()
    {
        $userId = auth()->id(); 
        $user = UsersModel::find($userId); // Получаем данные пользователя по его ID

        return view('posts-create', compact('user'));
    }

    public function posts_create_check(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:200',
            'body' => 'required|min:4',
        ]);

        $newPosts = new PostsModel();
        $newPosts->title = $request->input('title');
        $newPosts->body = $request->input('body');
        $newPosts->user_id = Auth::id(); 
        $newPosts->status = "cheking";//заглушка, нужно поменять 

        // Получаем путь к изображению из сессии
        if (session()->has('image_path')) {
            $newPosts->image = session('image_path');
            // Очищаем сессию после использования
            session()->forget('image_path');
        }

        $newPosts->save();

        return back()->with('success', 'Пост успешно создан!');
    }

    public function update_account(Request $request)
    {
    }
}
