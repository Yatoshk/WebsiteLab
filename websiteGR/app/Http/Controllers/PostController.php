<?php
namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
    
        // Проверяем, был ли передан параметр для фильтрации по пользователю
        if ($request->has('filter_by_user') && $request->filter_by_user == 'true') {
            // Получаем только посты текущего пользователя
            $posts = PostsModel::where('user_id', $user->id)->get();
        } else {
            // Получаем все посты
            $posts = PostsModel::all();
        }
        
        return view('posts', compact('posts'));
    }
}