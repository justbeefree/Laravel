<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новость {{$news['id']}}</title>
</head>
<body>
<div style="text-align: center">
    <h1>{{$news['name'] . ' ' . $news['id']}}</h1>
    <p>
        {{$news['detailText'] . ' ' . $news['id']}}
    </p>
    <hr style="width: 300px">
    <div>
        <a href="{{route('news.list', $news['category'])}}"><b>Назад</b></a>
    </div>
</div>
</body>
</html>
