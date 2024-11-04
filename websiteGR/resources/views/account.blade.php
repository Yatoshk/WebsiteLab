<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_account.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
  {{-- <div class = "grid-container">

    <div class="grid-item">
      <img src="{{ asset('images/avatar.svg') }}" alt="avatar" class="avatar" id="avatarImage">
      <p class="username"> Username </p>
        <input type="file" id="avatarInput" accept="image/*" style="display: none;" />
    </div>

    <p style="color: aliceblue">Ваш ID: {{ $userId }}</p>
    
    
    <div class="form_upd">

      <div class="grid-menu grid-item">
        <button class="posts">
          <img src="{{ asset('images/posts.svg') }}" alt="posts" class="button_icon">
        </button>
        <button class="settings">
          <img src="{{ asset('images/settings.svg') }}" alt="settings" class="button_icon">
        </button>
        <button class="admin">
          <img src="{{ asset('images/admin.svg') }}" alt="admin" class="button_icon">
        </button>
      </div>

      <form class="grid-item update_form" method="post" action="/account/update">
        <button type="button" id="uploadButton">
            Изменить фото
            <img src="{{ asset('images/add_avatar.svg') }}" alt="add avatar" class="button_add">
        </button>

        <p class="login title"> Логин </p>
        <p id = "user_login" class="user_data"> login </p>
        <input type="text" id="inputFieldLogin" class="input-field" placeholder="login">
        <button id="changeButtonLogin" type="button" class="upd_button">Изменить</button>

        <p class="password title"> Пароль </p>
        <p id = "user_password" class="user_data"> ********** </p>
        <input type="text" id="inputFieldPassword" class="input-field" placeholder="password">
        <button id="changeButtonPassword" type="button" class="upd_button">Изменить</button>

        <p class="email title"> Почта </p>
        <p id = "user_email" class="user_data"> email </p>
        <input type="text" id="inputFieldEmail" class="input-field" placeholder="email">
        <button id="changeButtonEmail" type="button" class="upd_button">Изменить</button>

        <button type="submit" class="light-button"> Сохранить </button>
      </form>

    </div>

  </div> --}}

  <div class="grid-container">

    <div class="grid-item">
      <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar.svg') }}" alt="avatar" class="avatar" id="avatarImage">
      <p class="username">{{ $user->username }}</p> <!-- Отображаем реальное имя пользователя -->
      <input type="file" id="avatarInput" accept="image/*" style="display: none;" />
    </div>
  
    <div class="form_upd">
      <div class="grid-menu grid-item">
          <button class="posts" onclick="window.location.href='{{ route('posts', ['filter_by_user' => 'true']) }}'">
            <img src="{{ asset('images/posts.svg') }}" alt="posts" class="button_icon">
          </button>
          <button class="settings">
              <img src="{{ asset('images/settings.svg') }}" alt="settings" class="button_icon">
          </button>
          <button class="admin">
              <img src="{{ asset('images/admin.svg') }}" alt="admin" class="button_icon">
          </button>
      </div>

      <form class="grid-item update_form" method="post" action="/account/update">
        @csrf 
        <button type="button" id="uploadButton">
            Изменить фото
            <img src="{{ asset('images/add_avatar.svg') }}" alt="add avatar" class="button_add">
        </button>

        <p class="login title"> Логин </p>
        <p id="user_login" class="user_data">{{ $user->login }}</p> <!-- Отображаем логин -->
        <input type="text" name="login" id="inputFieldLogin" class="input-field" placeholder="login" value="{{ $user->login }}">
        <button id="changeButtonLogin" type="button" class="upd_button">Изменить</button>

        <p class="password title"> Пароль </p>
        <p id="user_password" class="user_data"> ********** </p> <!-- Пароль не отображаем -->
        <input type="text" name="password" id="inputFieldPassword" class="input-field" placeholder="password">
        <button id="changeButtonPassword" type="button" class="upd_button">Изменить</button>

        <p class="email title"> Почта </p>
        <p id="user_email" class="user_data">{{ $user->email }}</p> <!-- Отображаем email -->
        <input type="text" name="email" id="inputFieldEmail" class="input-field" placeholder="email" value="{{ $user->email }}">
        <button id="changeButtonEmail" type="button" class="upd_button">Изменить</button>
        
        <button type="submit" class="light-button"> Сохранить </button>
      </form>
    </div>
    

        {{-- @if(session('success'))//сообщение что данные обновлены
          <div style="color: aliceblue" class="alert alert-success">{{ session('success') }}</div>
        @endif --}}

        @if($errors->any())
            <div class="alert alert-danger" style="color: aliceblue">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
  </div>
   
  {{-- Загрузка аватара --}}
  <script>
   document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('avatarInput').click();
    });

    document.getElementById('avatarInput').addEventListener('change', function() {
        const file = this.files[0];
        
        if (file) {
            const formData = new FormData();
            formData.append('avatar', file);
            formData.append('user_id', '{{ $user->id }}'); // Добавляем ID пользователя
            formData.append('_token', '{{ csrf_token() }}'); // Добавляем CSRF токен

            fetch('/upload-avatar', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Обновляем изображение аватара
                    document.getElementById('avatarImage').src = data.avatar_url;
                } else {
                    alert('Ошибка при загрузке изображения');
                }
            })
            .catch(error => console.error('Ошибка:', error));
        }
    });
  </script>

{{-- Отображание полей ввода --}}
  <script>
    document.getElementById('changeButtonLogin').addEventListener('click', function() {
        // Скрываем кнопку
        this.style.display = 'none';

        // Показываем поле ввода и форму
        document.getElementById('inputFieldLogin').style.display = 'block';

        // Скрываем текст
        document.getElementById('user_login').style.display = 'none';
    });
  </script>

  <script>
    document.getElementById('changeButtonPassword').addEventListener('click', function() {
        // Скрываем кнопку
        this.style.display = 'none';

        // Показываем поле ввода и форму
        document.getElementById('inputFieldPassword').style.display = 'block';

        // Скрываем текст
        document.getElementById('user_password').style.display = 'none';
    });
  </script>

  <script>
    document.getElementById('changeButtonEmail').addEventListener('click', function() {
        // Скрываем кнопку
        this.style.display = 'none';

        // Показываем поле ввода и форму
        document.getElementById('inputFieldEmail').style.display = 'block';

        // Скрываем текст
        document.getElementById('user_email').style.display = 'none';
    });
  </script>
</body>
</html>