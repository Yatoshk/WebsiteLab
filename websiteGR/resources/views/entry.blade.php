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
    <div class = "centred">
        <h1 class="logo"> GR </h1>
        <p class = "error"></p>
        <form>
            <p><input type="text" name="login" placeholder="login" class = "input-field"/></p>
            <p><input type="text" name="password" placeholder="password" size="18" maxlength="11" class = "input-field"/></p>
            <p class = "bt-center"><button type="enter" class = "light-button">Войти</button> </p>
        </form>
        <p><button type="registrationLink" class = "registration-link-button">Нет аккаунта? Зарегистрируйся</button> </p>
    </div>
</body>
</html>