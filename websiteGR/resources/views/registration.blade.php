<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
    <div class = "grid-container">
        <h1 class="grid-item logo"> GR </h1>
        
        <form class = "grid-item" method = "post" action = "/registration/check">
            @csrf
            <p><input type="text" name="login" placeholder="login" size="18" class = "input-field"/></p>
            <p><input type="text" name="email" placeholder="email" size="18" class = "input-field"/></p>
            <p><input type="text" name="password" placeholder="password" size="18" maxlength="11" class = "input-field"/></p>
            <p><input type="text" name="repeatePassword" placeholder="repeate password" size="18" maxlength="11" class = "input-field"/></p>
            <p><input type="text" name="username" placeholder="username" size="18" maxlength="30" class = "input-field"/></p>
            <p class = "bt-center"><button type="submit" class = "light-button">Зарегистрироваться</button> </p>
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