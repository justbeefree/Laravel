@extends('layouts.admin')

@section('page.title', 'Новости')

@section('content')

    <div class="row me-0" style="">
        <div class="col-3">
            <h2>{{__('Категории')}}</h2>
        </div>
        <div class="col-9 end-0 text-end pe-0">
            <a href="{{route('admin.news.create')}}" class="btn btn-primary">{{__('Добавить новость')}}</a>
        </div>
    </div>

    <div class="alerts">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        @if ($alert = session()->pull('alert'))
            <x-alert type="{{session()->pull('status')?:'success'}}" :message="$alert"></x-alert>
        @endif
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Preview text</th>
            <th scope="col">Detail text</th>
            <th scope="col">Images url</th>
            <th scope="col">Active</th>
            <th scope="col">Category</th>
            <th scope="col">Source</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->preview_text}}</td>
                <td>{{$item->detail_text}}</td>
                <td>{{$item->images}}</td>
                <td>{{$item->active}}</td>
                <td>{{$category[$item->category_id]['name']}}</td>
                <td>{{$source[$item->source_id]['name']}}</td>
                <td><a href="{{ route('admin.news.edit', $item) }}">Edit</a></td>
                <td><a class="js-admin-delete" href="{{ route('admin.news.destroy', $item) }}"
                       data-csrf="{{csrf_token()}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $news->links('layouts.pagination') }}
@endsection
