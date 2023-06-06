@extends('layouts.base')

@section('page.title', 'Создание новости')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-0">
                                {{__('Создание новости')}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('news.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">Название новости</label>
                                    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="Название новости">
                                </div>
                                <div class="mb-3">
                                    <label for="previewText" class="form-label required">Текст анонса новости</label>
                                    <textarea class="form-control" id="previewText" name="previewText" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="detailText" class="form-label required">Подробное описание новости</label>
                                    <textarea class="form-control" id="detailText" name="detailText"  rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('news')}}" class="btn btn-primary my-2">{{__('Назад')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
