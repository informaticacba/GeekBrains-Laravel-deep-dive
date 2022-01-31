@extends('layouts.admin')

@section('title')
    Список источников @parent
@stop

@section('header')
    <h1 class="h2">Список источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.dataSources.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить источник данных</a>
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
                <th>Наименование</th>
                <th>Ссылка</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->title }}</td>
                    <td>{{ $source->link }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td>{{ $source->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.dataSources.edit', ['dataSource' => $source]) }}">Редактировать</a><br>
                        <a href="">Удалить</a>
                    </td>
                </tr>
            @empty
                Источников нет
            @endforelse
            </tbody>
        </table>
        {{ $sources->links() }}
    </div>
@endsection
