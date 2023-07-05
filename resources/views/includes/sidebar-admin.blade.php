<div class="text-white bg-dark h-100">
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none ps-3">
        <span class="fs-4">Admin</span>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link text-white @if (request()->routeIs('admin.index')) active @endif" aria-current="page">
                {{__('Home')}}
            </a>
        </li>
        <li>
            <a href="{{route('admin.category.index')}}" class="nav-link text-white @if (request()->routeIs('admin.category*')) active @endif">
                {{__('Категории')}}
            </a>
        </li>
        <li>
            <a href="{{route('admin.news.index')}}" class="nav-link text-white @if (request()->routeIs('admin.news*')) active @endif">
                {{__('Новости')}}
            </a>
        </li>
        <li>
            <a href="{{route('admin.source.index')}}" class="nav-link text-white @if (request()->routeIs('admin.source*')) active @endif">
                {{__('Источники')}}
            </a>
        </li>

        <li>
            <a href="{{route('admin.order.index')}}" class="nav-link text-white @if (request()->routeIs('admin.order*')) active @endif">
                {{__('Заказы')}}
            </a>
        </li>
        <li>
            <a href="{{route('admin.feedback.index')}}" class="nav-link text-white @if (request()->routeIs('admin.feedback*')) active @endif">
                {{__('FeedBack')}}
            </a>
        </li>
    </ul>
</div>
