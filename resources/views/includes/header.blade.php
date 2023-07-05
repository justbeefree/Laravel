<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{route('main')}}" class="navbar-brand">
            <img src="/img/laravel_icon_135451.png" alt="Logo" width="30" height="24"
                 class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('main')) active @endif" aria-current="page" href="{{route('main')}}">
                        {{__('Главная')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('news*')) active @endif" aria-current="page" href="{{route('news')}}">
                        {{__('Новости')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('order*')) active @endif" aria-current="page" href="{{route('order')}}">
                        {{__('Заказ на выгрузку')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('feedback*')) active @endif" aria-current="page" href="{{route('feedback')}}">
                        {{__('Feedback')}}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('personal*')) active @endif" aria-current="page" href="{{route('personal')}}">
                        {{__('Вход')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


