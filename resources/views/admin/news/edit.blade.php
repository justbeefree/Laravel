@extends('layouts.admin')

@section('page.title', 'Редактирование')

@section('content')
    <h2>{{__('Редактирование новости')}}</h2>
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
                            <form action="{{route('admin.news.update', $news)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="inputName" class="form-label required">{{__('Название')}}</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                           aria-describedby="{{__('Название')}}" value="{{old("name")?:$news->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="previewText" class="form-label required">{{__('Текст анонса')}}</label>
                                    <textarea class="form-control" id="previewText" name="previewText"
                                              rows="3">{{old("previewText")?:$news->preview_text}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="detailText" class="form-label required">{{__('Детальный текст')}}</label>
                                    <textarea class="form-control" id="detailText" name="detailText"
                                              rows="3">{{old("detailText")?:$news->detail_text}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">{{__('Картинка')}}</label>
                                    <input class="form-control" type="file" id="formFile" name="images">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="status" @if(old('status') || $news->active)  checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('Статус')}}
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="category" aria-label="{{__('Категория')}}">
                                        <option value="" @if(empty(old('category')))  selected @endif>{{__('Категория')}}</option>
                                        @foreach($category as $item)
                                            <option @if(old('category') === $item->id || $news->category_id === $item->id)  selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="source" aria-label="{{__('Источник')}}">
                                        <option value="" @if(empty(old('source')))  selected @endif>{{__('Источник')}}</option>
                                        @foreach($source as $item)
                                            <option @if(old('source') === $item->id || $news->source_id === $item->id)  selected @endif value="{{$item->id}}">{{$item->name}}</option>
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

@push('js')
    <script>
        var $option = {
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        };

        $('#detailText').ckeditor($option);
        $('#previewText').ckeditor();
    </script>
@endpush
