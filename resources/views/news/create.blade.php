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
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                              <x-alert type="danger" :message="$error"></x-alert>
                            @endforeach
                        @endif
                        @if ($alert = session()->pull('alert'))
                            <x-alert type="success" :message="$alert"></x-alert>
                        @endif
                        <div class="card-body">
                            <form action="{{route('news.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Название новости')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="Название новости" value="{{old("name")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="previewText" class="form-label required">{{__('Текст анонса новости')}}</label>
                                    <textarea class="form-control" id="previewText" name="previewText"
                                              rows="3">{{old("previewText")}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="detailText" class="form-label required">{{__('Подробное описание
                                        новости')}}</label>
                                    <textarea class="form-control" id="detailText" name="detailText"
                                              rows="3">{{old("detailText")}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">{{__('Изображение')}}</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="status" aria-label="Статусы">
                                        <option value="" @if(empty(old('status')))  selected @endif>{{__('Статус')}}</option>
                                        <option @if(old('status') === 'DRAFT')  selected @endif value="DRAFT">DRAFT</option>
                                        <option @if(old('status') === 'ACTIVE')  selected @endif  value="ACTIVE">ACTIVE</option>
                                        <option @if(old('status') === 'BLOCKED')  selected @endif value="BLOCKED">BLOCKED</option>
                                    </select>
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
