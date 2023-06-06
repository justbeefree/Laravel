<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Авторизация</title>
</head>
<body>
<div class="m-auto p-3 text-center border border-2 rounded" style="width: 400px">
    <form action="{{route('personal.auth')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" id="login" name="login" aria-describedby="Логин">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="password" name="password" aria-describedby="Пароль">
        </div>
        <div class="form-check text-start">
            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="remember" checked>
            <label class="form-check-label" for="flexCheckChecked" >
               Запомнить меня
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
<div style="text-align: center">
    <div>
        <a href="{{route('main')}}"><b>Назад</b></a>
    </div>
</div>
</body>
</html>
