@extends('layouts.admin')
@section('title')
    Редактировать отзыв @parent
@stop
@section('header')
    <h1 class="h2">Редактировать отзыв</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.feedbacks.update', ['feedback' => $feedback]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $feedback->name }}">
        </div>
        <div class="form-group">
            <label for="comment">Описание</label>
            <textarea class="form-control" id="comment" name="comment">{!! $feedback->comment !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
