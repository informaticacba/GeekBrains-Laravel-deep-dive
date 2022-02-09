@extends('layouts.admin')
@section('title')
    Редактировать пользователя @parent
@stop
@section('header')
    <h1 class="h2">Редактировать пользователя</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="remember_token">Токен</label>
            <input type="text" class="form-control" id="remember_token" name="remember_token" value="{{ $user->remember_token }}">
        </div>
        <div class="form-group">
            <label for="is_admin">Администратор</label>
            <select class="form-control" id="is_admin" name="is_admin">
                <option @if($user->is_admin == true) selected @endif value=1>Да</option>
                <option @if($user->is_admin == false) selected @endif value=0>Нет</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
