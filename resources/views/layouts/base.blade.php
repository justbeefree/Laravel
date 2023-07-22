<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('page.title', config('app.name'))
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <style>
        .container{
            max-width: 1200px;
        }
        .required:after {
            content: '*';
            color: #ff0000;
            margin-left: 3px;
        }
        .link {
            display:inline-block;
        }

        .social {
            text-align: center;
        }

        .link a {
            display:block;
            padding-left: 0px;
            padding-right: 0px;
        }
    </style>
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.header')

    <main class="flex-grow-1 py-3">
        @yield('content')
    </main>

    @include('includes.footer')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>
