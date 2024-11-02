<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
    <div class = "grid-container">
        <h1 class="grid-item logo "> GR </h1>
        <form class = "grid-item" method = "post" action = "/entry/check">
            @csrf
            <p><input type="text" name="login" placeholder="login" class = "input-field"/></p>
            <p><input type="text" name="password" placeholder="password" size="18" maxlength="11" class = "input-field"/></p>
            <p><button type="enter" class = "light-button">Войти</button> </p>
        </form>
        <a class = "grid-item registration-link-button" type="registrationLink"  href = "http://127.0.0.1:8000/registration">Нет аккаунта? Зарегистрируйся</a>
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