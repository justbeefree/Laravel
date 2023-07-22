@extends('layouts.base')

@section('page.title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Профиль') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Привет, {{ Auth::user()->name}}</h3>
                        <br>
                            @if (Auth::user()->avatar)
                                <img src="{{Auth::user()->avatar}}" style="width: 150px;">
                            @endif
                        <br>
                            @if(Auth::user()->is_admin)
                                <p>
                                    <a href="{{route('admin.index')}}" style="color:red; text-decoration: none;">В админку</a>
                                </p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

