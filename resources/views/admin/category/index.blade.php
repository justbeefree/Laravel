@extends('layouts.admin')

@section('page.title', 'Категории')

@section('content')

    <div class="row me-0" style="">
        <div class="col-3">
            <h2>{{__('Категории')}}</h2>
        </div>
        <div class="col-9 end-0 text-end pe-0">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary">Добавить категорию</a>
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
            <th scope="col">Description</th>
            <th scope="col">Active</th>
            <th scope="col">Code</th>
            <th scope="col">Source</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->active}}</td>
                <td>{{$item->code}}</td>
                <td>{{$source[$item->source_id]['name']}}</td>
                <td><a href="{{ route('admin.category.edit', $item) }}">Edit</a></td>
                <td><a class="js-admin-delete" href="{{ route('admin.category.destroy', $item) }}"
                       data-csrf="{{csrf_token()}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $category->links('layouts.pagination') }}
@endsection
