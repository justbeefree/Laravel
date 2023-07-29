@extends('layouts.base')

@section('page.title', $category->name)

@section('content')
    <section>
        <div class="container">
            <h1>{{$category->name}}</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if(empty($category))
                    {{__('Нет новостей в категории')}}
                @else
                    @foreach($news as $code => $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{Storage::disk('public')->url($item['images'])}}" width="100%" height="225">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$item['name']}}
                                    </h5>
                                    <p class="card-text">
                                        {!! $item['previewText'] !!}
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
            </div>
        </div>
    </section>


@endsection
