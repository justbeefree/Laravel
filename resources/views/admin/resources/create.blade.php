@extends('layouts.admin')

@section('page.title', 'Создание')

@section('content')
    <h2>{{__('Создание ресурса')}}</h2>
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
                            <form action="{{route('admin.resource.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputLink" class="form-label required">{{__('Ссылка на XML')}}</label>
                                    <input type="text" class="form-control" id="inputLink" name="link"
                                           aria-describedby="{{__('Ссылка на XML')}}" value="{{old("link")}}">
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
