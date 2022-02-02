@extends('layouts.admin')
@section('title')
    Добавить новость @parent
@stop
@section('header')
    <h1 class="h2">Добавить новость</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.news.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="categories">Выбрать категории</label>
            <select class="form-control" id="categories" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(in_array($category->id, old('categories') ?? [])) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="source_id">Выбрать источник</label>
            <select class="form-control" id="source_id" name="source_id">
                @foreach($data_sources as $source)
                    <option value="{{ $source->id }}" @if(intval(old('source_id')) === $source->id) selected @endif>{{ $source->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="short_description">Короткое описание</label>
            <textarea class="form-control" id="short_description" name="short_description">{!! old('short_description') !!}</textarea>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
