@if($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination pagination-sm flex" style="justify-content: right">
            @for($i = 1; $i<= $paginator->lastPage(); $i++)
                @if($paginator->currentPage() == $i)
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            {{$i}}
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{$paginator->url($i)}}">
                            {{$i}}
                        </a>
                    </li>
                @endif
            @endfor
        </ul>
    </nav>
@endif

