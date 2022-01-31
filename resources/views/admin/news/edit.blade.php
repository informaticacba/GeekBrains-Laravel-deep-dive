@extends('layouts.admin')
@section('title')
    Редактировать новость @parent
@stop
@section('header')
    <h1 class="h2">Редактировать новость</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="categories">Выбрать категории</label>
            <select class="form-control" id="categories" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @if(in_array($category->id, $selectCategories)) selected @endif
                    >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="source_id">Выбрать источник</label>
            <select class="form-control" id="source_id" name="source_id">
                @foreach($data_sources as $source)
                    <option
                        value="{{ $source->id }}"
                        @if(intval($news->source_id) === $source->id) selected @endif
                    >
                        {{ $source->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="short_description">Короткое описание</label>
            <textarea class="form-control" id="short_description" name="short_description">{!! $news->short_description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{!! $news->description !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
