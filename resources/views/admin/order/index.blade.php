@extends('layouts.admin')

@section('page.title', 'Заказы')

@section('content')

    <div class="row me-0" style="">
        <div class="col-3">
            <h2>{{__('Заказы')}}</h2>
        </div>
        <div class="col-9 end-0 text-end pe-0">
            <a href="{{route('admin.order.create')}}" class="btn btn-primary">{{__('Добавить заказ')}}</a>
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
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Text</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->text}}</td>
                <td><a href="{{ route('admin.order.edit', $item) }}">Edit</a></td>
                <td><a class="js-admin-delete" href="{{ route('admin.order.destroy', $item) }}"
                       data-csrf="{{csrf_token()}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $order->links('layouts.pagination') }}
@endsection
