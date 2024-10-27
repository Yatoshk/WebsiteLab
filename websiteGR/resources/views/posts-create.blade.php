<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Posts</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts-create.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
    <div class = "grid-container">
        
        <form class = "grid-item" method = "post" action = "/posts-create/check">
            @csrf
            <p class="bt-center">
                <button type="submit" class="dark-button">
                    <img src="{{ asset('images/save_post.svg') }}" alt="save" class="button-icon"> 
                </button>
            </p>
            <p><input type="text" name="title" placeholder="title" size="18" class = "input-field"/></p>
            {{-- <p><input type="text" name="body" placeholder="text text text" size="18" class = "input-field"/></p> --}}
            <textarea name="body" rows="20" cols="50"  placeholder="Введите ваше сообщение здесь..."></textarea>
        </form>

        @if ($errors -> any())
            <div class = "grid-item error">
                <ul>
                    @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</body>
</html>