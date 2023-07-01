@extends('layouts.admin')

@section('page.title', 'Редактирование')

@section('content')
    <h2>{{__('Редактирование источника')}}</h2>
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
                            <form action="{{route('admin.source.update', $source)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Название')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Название')}}" value="{{old("name")?:$source->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputLink" class="form-label required">{{__('Ссылка')}}</label>
                                    <input type="text" class="form-control" id="inputLink" name="link"
                                           aria-describedby="{{__('Ссылка')}}" value="{{old("link")?:$source->link}}">
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
