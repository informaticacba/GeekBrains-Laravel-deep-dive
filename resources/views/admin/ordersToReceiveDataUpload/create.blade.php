@extends('layouts.admin')
@section('title')
    Добавить заказ @parent
@stop
@section('header')
    <h1 class="h2">Добавить заказ</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.ordersToReceiveDataUpload.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        @error('name') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        @error('phone') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        @error('email') <b style="color: red;">{{ $message }}</b> @enderror
        <div class="form-group">
            <label for="info">Информация о получаемых данных</label>
            <textarea class="form-control" id="info" name="info">{!! old('info') !!}</textarea>
        </div>
        @error('info') <b style="color: red;">{{ $message }}</b> @enderror
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
