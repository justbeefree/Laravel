@extends('layouts.base')

@section('page.title', __('Зказ на выгрузку'))

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-0">
                                {{__('Заказ на выгрузку')}}
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
                            <form action="{{route('order.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Имя заказчика')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Имя заказчика')}}" value="{{old("name")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPhone" class="form-label required">{{__("Телефон")}}</label>
                                    <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="+7 (XXX) XXX-XX-XX" value="{{old("phone")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label required">{{__("Email")}}</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com" value="{{old("email")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="detailText" class="form-label required">{{__('Какую информцию вы хотите получить?')}}</label>
                                    <textarea class="form-control" id="detailText" name="textInfo"
                                              rows="3">{{old("textInfo")}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">{{__("Отправить")}}</button>
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
