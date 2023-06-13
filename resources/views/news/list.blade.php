@extends('layouts.base')

@section('page.title', $category['name'])

@section('content')
    <section>
        <div class="container">
            <h1>{{$category['name']}}</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if(empty($category))
                    {{__('Нет новостей в категории')}}
                @else
                    @foreach($news as $code => $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$item['name'] . ' ' . $item['id']}}
                                    </h5>
                                    <p class="card-text">
                                        {!! $item['previewText']  . ' ' . $item['id'] !!}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a  href="{{route('news.show', [$item['category'], $item['id']])}}" class="btn btn-sm btn-outline-secondary">{{__('Подробнее')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('news')}}" class="btn btn-primary my-2">{{__('Назад')}}</a>
                <a href="{{route('news.create')}}" class="btn btn-primary my-2 ms-5">{{__('Добавить новость')}}</a>
            </div>
        </div>
    </section>


@endsection
