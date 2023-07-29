@extends('layouts.admin')

@section('page.title', 'Ресурсы')

@section('content')

    <div class="row me-0" style="">
        <div class="col-3">
            <h2>{{__('Ресурсы')}}</h2>
        </div>
        <div class="col-9 end-0 text-end pe-0">
            <a href="{{route('admin.resource.create')}}" class="btn btn-primary">{{__('Добавить ресурс')}}</a>
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
            <th scope="col">Link XML</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->link}}</td>
                <td><a href="{{ route('admin.resource.edit', $item) }}">Edit</a></td>
                <td><a class="js-admin-delete" href="{{ route('admin.resource.destroy', $item) }}"
                       data-csrf="{{csrf_token()}}">Delete</a></td>
                <td><a class="js-add-job" href="{{ route('admin.parser', $item) }}"
                       data-csrf="{{csrf_token()}}">ADD JOB</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $resources->links('layouts.pagination') }}
@endsection
