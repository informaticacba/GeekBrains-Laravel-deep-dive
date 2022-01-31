@extends('layouts.admin')
@section('title')
    Добавить источник @parent
@stop
@section('header')
    <h1 class="h2">Добавить источник</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.dataSources.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
