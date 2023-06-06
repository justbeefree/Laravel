<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$category['name']}}</title>
</head>
<body>
<div style="text-align: center">
    <h1>{{$category['name']}}</h1>
    @foreach($news as $key => $item)
        <a href="{{route('news.show', [$item['category'], $item['id']])}}">
            <div>
                <b>{{$item['name'] . ' ' . $item['id']}}</b>
                <p>
                    {{$item['previewText']  . ' ' . $item['id']}}
                </p>
            </div>
        </a>
        <hr style="width: 300px">
    @endforeach
    <div>
        <a href="{{route('news.create')}}"  style="color: #ff0000"><b>Добавить новость</b></a>
    </div>
    <hr style="width: 300px">
    <div>
        <a href="{{route('news')}}" style="color: #000000"><b>Назад</b></a>
    </div>
</div>
</body>
</html>
