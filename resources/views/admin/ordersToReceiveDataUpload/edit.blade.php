@extends('layouts.admin')
@section('title')
    Редактировать заказ @parent
@stop
@section('header')
    <h1 class="h2">Редактировать заказ</h1>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.ordersToReceiveDataUpload.update', ['order' => $order]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $order->phone }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $order->email }}">
        </div>
        <div class="form-group">
            <label for="info">Информация о получаемых данных</label>
            <textarea class="form-control" id="info" name="info">{!! $order->info !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
