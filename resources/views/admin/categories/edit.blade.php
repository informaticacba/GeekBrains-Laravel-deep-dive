@extends('layouts.admin')
@section('title')
    Редактировать категорию @parent
@stop
@section('header')
    <h1 class="h2">Редактировать категорию</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{!! $category->description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Название картинки</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $category->image }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
