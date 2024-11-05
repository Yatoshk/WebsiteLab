<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
    <div class = "grid-container">
        <div class="grid-header">
            <p class="logo">GR</p>
            <button class="dark-button" onclick="window.location.href='http://127.0.0.1:8000/posts-create'">
                Написать 
                <img src="{{ asset('images/new_post.svg') }}" alt="write post" class="button-icon"> 
            </button>
            @if(Auth::check())
                <div class="user-info">
                    <a href="{{ route('account.index') }}">
                        <img src="{{ Auth::user()->avatar !== 'no' ? asset('storage/' . Auth::user()->avatar) : asset('images/default_avatar.svg') }}" alt="avatar" class="avatar">
                    </a>
                    <span class="username_head">{{ Auth::user()->username }}</span>
                </div>
            @else
                <button class="light-button" onclick="window.location.href='http://127.0.0.1:8000/account'">Войти</button>
            @endif
        </div>
    
        @if($posts->isEmpty())
            <p style="color: aliceblue">Нет постов для отображения.</p>
        @else
            <p style="color: aliceblue">Количество постов: {{ $posts->count() }}</p>
            @foreach ($posts as $post)
                <div class="grid-main grid-item">   
                    <div class="grid-container">
                        <div class="grid-header_post">
                            <p class="title">{{ $post->title }}</p>
                            <img src="{{ $post->user->avatar !== 'no' ? asset('storage/' . $post->user->avatar) : asset('images/avatar.svg') }}" alt="avatar" class="avatar">
                            <p class="username">{{ $post->user->username ?? 'Неизвестный автор' }}</p>
                        </div>
                        <p class="time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
    
                        <div class="grid-main_post">
                            <p class="body">{{ $post->body }}</p>

                            <img src="{{ $post->image !== 'no' ? asset('storage/' . $post->image) : asset('images/image_post.png') }}" alt="img"  class="image">
    
                            <div class="post_button">
                                {{-- <button class="comments">
                                    <img src="{{ asset('images/comments.svg') }}" alt="comment" class="comment_icon">
                                </button> --}}
                                <button class="in_post">
                                    <img src="{{ asset('images/right_arrow.svg') }}" alt="in post" class="in_post_icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        
        
        
        
        {{-- <div class = "grid-main grid-item">   
            <div class = "grid-container">
                <div class = "grid-header_post">
                    <p class="title">Название</p>
                    
                    <img src="{{ asset('images/avatar.svg') }}" alt="write post" class="avatar">
                    <p class="username">Ник автора</p>
                </div>
                <p class="time">Время</p>

                <div class = "grid-main_post">

                    <p class="body">текст текст</p>

                    <div class="post_button">
                        <button class="delete">
                            <img src="{{ asset('images/delete.svg') }}" alt="delete" class="delete_icon">
                        </button> {{-- для админа --}}
                       {{-- <button class="comments">
                            <img src="{{ asset('images/comments.svg') }}" alt="comment" class="comment_icon">
                        </button>
                    </div>
                </div>

                {{-- <div class = "grid-right_post">
                    <button class="delete">
                        <img src="{{ asset('images/delete.svg') }}" alt="delete" class="delete_icon">
                    </button> {{-- для админа --}}
                    {{-- <button class="comments">
                        <img src="{{ asset('images/comments.svg') }}" alt="comment" class="comment_icon">
                    </button>
                </div> --}}
            {{--</div>
        </div> --}}
    </div>
</body>
</html>