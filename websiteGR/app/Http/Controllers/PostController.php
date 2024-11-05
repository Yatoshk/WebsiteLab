<?php
namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

    public function uploadImg(Request $request)
    {
        Log::info($request->all());

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users_models,id',
        ]);
    
        // Создаем новую запись в таблице posts_models
        $post = new PostsModel();
        $post->user_id = $request->user_id;
    
        if ($request->hasFile('img')) {
            // Сохраняем изображение
            $path = $request->file('img')->store('images', 'public');
            $post->image = $path; // Сохраняем путь к изображению в поле image
        }

        // Сохраняем путь к изображению в сессии
        session(['image_path' => $path]);
    
        return response()->json(['success' => true, 'image_url' => Storage::url($path)]);
    }
}