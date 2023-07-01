@extends('layouts.admin')

@section('page.title', 'Редактирование')

@section('content')
    <h2>{{__('Редактирование категории')}}</h2>
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
                            <form action="{{route('admin.category.update', $category)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Название')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Название')}}" value="{{old("name")?:$category->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label required">{{__('Описание')}}</label>
                                    <textarea class="form-control" id="description" name="description"
                                              rows="3">{{old("description")?:$category->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputCode" class="form-label required">{{__('Код')}}</label>
                                    <input type="text" class="form-control" id="inputCode" name="code"
                                           aria-describedby="{{__('Код')}}" value="{{old("code")?:$category->code}}">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="status" @if(old('status') || $category->active)  checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('Статус')}}
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="source" aria-label="{{__('Источник')}}">
                                        <option value="" @if(empty(old('source')))  selected @endif>{{__('Источник')}}</option>
                                        @foreach($source as $item)
                                            <option @if((old('source')?:$category->source_id) === $item->id)  selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
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
