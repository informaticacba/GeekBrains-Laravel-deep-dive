@extends('layouts.admin')

@section('title')
    Список заказов на получение выгрузки данных @parent
@stop

@section('header')
    <h1 class="h2">Список заказов на получение выгрузки данных</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.ordersToReceiveDataUpload.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить заказ</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Номер телефона</th>
                <th>E-mail</th>
                <th>Информация</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->info }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.ordersToReceiveDataUpload.edit', ['order' => $order]) }}">Редактировать</a><br>
                        <a href="javascript:" class="delete" rel="{{ $order->id }}">Удалить</a>
                    </td>
                </tr>
            @empty
                Заказов нет
            @endforelse
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
