<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(auth()->check() && auth()->user()->admin)
    <p><a href="{{ route('admin_main') }}">На страницу администратора</a></p>
@endif

@if(auth()->check())
    {{ auth()->user()->name }}
    <a href="{{ route('user_logout') }}">Разлогин</a>
@else
    <h4>Пройдите авторизацию или <a href="{{ route('register_form') }}">зарегистрируйтесь</a></h4>
    <form action="{{ route('user_login') }}" method="post">
        @csrf
        <input name="login" type="email"> Ваш логин<br><br>
        <input name="password" type="password"> Пароль<br><br>
        <input type="submit" value="Войти"><br><br>
    </form>

@endif

<h1>Доска объявлений</h1>

@yield('content')

@if($_SERVER['REQUEST_URI'] != '/')

    <p><a href="{{ route('show_all_categories') }}">На главную</a></p>

@endif

</body>
</html>
