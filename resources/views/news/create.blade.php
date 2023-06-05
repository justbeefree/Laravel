<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Создание новости</title>
</head>
<body>
<div class="m-auto p-3 text-center border border-2 rounded" style="width: 400px">
    <form action="{{route('news.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="inputName" class="form-label">Название новости</label>
            <input type="text" class="form-control" id="inputName" name="name" aria-describedby="Название новости">
        </div>
        <div class="mb-3">
            <label for="previewText" class="form-label">Текст анонса новости</label>
            <textarea class="form-control" id="previewText" name="previewText" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="detailText" class="form-label">Подробное описание новости</label>
            <textarea class="form-control" id="detailText" name="detailText"  rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
<div style="text-align: center">
    <a href="{{route('news')}}"><b>Назад</b></a>
</div>
</body>
</html>
