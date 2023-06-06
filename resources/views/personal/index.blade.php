@extends('layouts.base')

@section('page.title', 'Авторизация')

@section('content')

   <section>
       <div class="container">
           <div class="row">
               <div class="col-12 col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="m-0">
                               {{__('Вход')}}
                           </h4>
                       </div>
                       <div class="card-body">
                           <form action="{{route('personal.auth')}}" method="post">
                               @csrf
                               <div class="mb-3">
                                   <label for="login" class="form-label required">
                                       {{__('Логин')}}
                                   </label>
                                   <input type="text" class="form-control" id="login" name="login" aria-describedby="{{__('Логин')}}">
                               </div>
                               <div class="mb-3">
                                   <label for="password" class="form-label required">
                                       {{__('Пароль')}}
                                   </label>
                                   <input type="text" class="form-control" id="password" name="password" aria-describedby="{{__('Пароль')}}">
                               </div>
                               <div class="form-check text-start mb-3">
                                   <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="remember" checked>
                                   <label class="form-check-label" for="flexCheckChecked" >
                                       {{__('Запомнить меня')}}
                                   </label>
                               </div>
                               <button type="submit" class="btn btn-primary">{{__('Войти')}}</button>
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
