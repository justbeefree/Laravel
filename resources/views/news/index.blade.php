@extends('layouts.base')

@section('page.title', 'Категории новостей')

@section('content')
    <section>
        <div class="container">
            <h1>
                {{__('Категории новостей')}}
            </h1>
            <div class="row">
            @if(empty($category))
                    {{__('Нет категорий новостей')}}
            @else
                @foreach($category as $code => $item)
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$item['name']}}
                                    </h5>
                                    <p class="card-text">
                                        {!!$item['description']!!}
                                    </p>
                                    <a href="{{route('news.list', $code)}}" class="btn btn-primary">{{__('К новостям категории')}}</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
            </div>
            <div>
                <a href="{{route('main')}}" class="btn btn-primary my-2">{{__('Назад')}}</a>
            </div>
        </div>
    </section>

@endsection
