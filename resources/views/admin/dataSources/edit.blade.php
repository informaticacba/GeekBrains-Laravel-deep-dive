@extends('layouts.admin')
@section('title')
    Редактировать источник @parent
@stop
@section('header')
    <h1 class="h2">Редактировать источник</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.dataSources.update', ['dataSource' => $dataSource]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $dataSource->title }}">
        </div>
        @error('title') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="link">Описание</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $dataSource->link }}">
        </div>
        @error('link') <b style="color: red;">{{ $message }}</b> @enderror
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
