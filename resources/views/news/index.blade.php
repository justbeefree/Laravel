<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<div style="text-align: center">
    <h1>Список новостей</h1>
    <div>
        <div>
            @for ($i = 1; $i <= 4; $i++)
            <div>
                <a href="/news/{{$i}}/">
                    <div>
                        <div>
                            <a href="/news/{{$i}}/">
                                Новость {{$i}}
                            </a>
                        </div>
                        <p style="font-size: 13px; margin-top: 7px;">24.05.2023</p>
                        <div>Текст новости {{$i}}</div>
                    </div>
                </a>
            </div>
                <hr style="width: 400px;">
            @endfor
        </div>
    </div>
</div>
</body>
</html>
