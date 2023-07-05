<nav class="navbar navbar-expand-md navbar-dark bg-secondary bg-gradient ps-3 text-white">
        <a href="{{route('main')}}" class="navbar-brand">
            <img src="/img/laravel-red.png" alt="Logo" width="30" height="24"
                 class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    {{__('Company name')}}
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-md-0 pe-3">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="#">
                        {{__('Sign out')}}
                    </a>
                </li>
            </ul>
        </div>
</nav>


