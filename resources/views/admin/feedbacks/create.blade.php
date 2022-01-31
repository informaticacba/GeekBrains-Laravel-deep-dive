@extends('layouts.admin')
@section('title')
    Добавить отзыв @parent
@stop
@section('header')
    <h1 class="h2">Добавить отзыв</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.feedbacks.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="comment">Описание</label>
            <textarea class="form-control" id="comment" name="comment">{!! old('comment') !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
