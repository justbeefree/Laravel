<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории новостей</title>
</head>
<body>
<div style="text-align: center">
    <h1>Категории новостей</h1>
    @foreach($category as $code => $item)
        <a href="{{route('news.list', $code)}}">
            <div>
                <b>{{$item['name']}}</b>
                <p>{{$item['description']}}</p>
                <hr style="width: 200px;">
            </div>
        </a>
    @endforeach
    <div>
        <a href="{{route('main')}}"><b>Назад</b></a>
    </div>
</div>
</body>
</html>
