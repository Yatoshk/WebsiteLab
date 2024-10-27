<?php
namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostsModel::with('user')->get(); // Получаем все посты с пользователями
        return view('posts', compact('posts')); // Передаем данные в представление
    }
}