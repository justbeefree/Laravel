@extends('layouts.base')

@section('page.title', 'Новость ' . $news['id'])

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$news['name'] . ' ' . $news['id']}}</h1>
                <img src="{{$news['images']}}">
                <p class="lead text-body-secondary">
                    {{$news['detailText'] . ' ' . $news['id']}}
                </p>
                <p>
                    <a href="{{route('news.list', $news['category'])}}" class="btn btn-primary my-2">{{__('Назад')}}</a>
                </p>
            </div>
        </div>
    </section>
@endsection
