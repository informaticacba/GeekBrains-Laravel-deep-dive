@extends('layouts.admin')

@section('title')
    Панель администратора @parent
@stop

@section('header')
    <h1 class="h2">Панель администратора</h1>
@endsection

@section('content')
    <div class="table-responsive">
        Панель администратора
        @php
            $msg = 'Внимание (Это сообщение создано динамически)';
        @endphp
        <x-alert type="success" message="Успешно"></x-alert>
        <x-alert type="danger" message="Ошибка"></x-alert>
        <x-alert type="warning" :message="$msg"></x-alert>
    </div>
@endsection

@push('js')
    <script>
        console.log('Hello world');
    </script>
@endpush
