@extends('layouts.admin')

@section('page.title', __('Создание пользователя'))

@section('content')
    <h2>{{__('Создание пользователя')}}</h2>
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
                            <form action="{{route('admin.user.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Имя')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Имя')}}" value="{{old("name")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label required">{{__("Email")}}</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com" value="{{old("email")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label required">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="is_admin" @if(old('is_admin'))  checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('Админ')}}
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__("Сохранить")}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
