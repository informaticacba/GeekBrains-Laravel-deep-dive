@extends('layouts.admin')
@section('title')
    Добавить категорию @parent
@stop
@section('header')
    <h1 class="h2">Добавить категорию</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        @error('title') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
        </div>
        @error('description') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="image">Название картинки</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
        </div>
        @error('image') <b style="color: red;">{{ $message }}</b> @enderror
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
