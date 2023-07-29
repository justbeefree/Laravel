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
        .required:after {
            content: '*';
            color: #ff0000;
            margin-left: 3px;
        }
    </style>
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.header-admin')
    <main class="flex-grow-1" style="position: relative;">
        <div class="row me-0" style="">
            <div class="col-3">
                @include('includes.sidebar-admin')
            </div>
            <div class="col-sm-9 p-3 content">
                @yield('content')
            </div>
        </div>
    </main>
    @include('includes.footer-admin')
</div>
<script
    src="https://code.jquery.com/jquery-3.7.0.js"
    integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
<script src="/js/admin.js"></script>
<script>
    var route_prefix = "/filemanager";
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
@stack('js')
</body>
</html>
