@extends('layouts.admin')

@section('page.title', 'Создание')

@section('content')
    <h2>{{__('Создание источника')}}</h2>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">

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
                            <form action="{{route('admin.source.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Название')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Название')}}" value="{{old("name")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputLink" class="form-label required">{{__('Ссылка')}}</label>
                                    <input type="text" class="form-control" id="inputLink" name="link"
                                           aria-describedby="{{__('Ссылка')}}" value="{{old("link")}}">
                                </div>
                                <button type="submit" class="btn btn-primary">{{__('Сохранить')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
