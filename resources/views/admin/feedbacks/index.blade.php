@extends('layouts.admin')

@section('title')
    Список отзывов @parent
@stop

@section('header')
    <h1 class="h2">Список отзывов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.feedbacks.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить отзыв</a>
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
                <th>Комментарий</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->created_at }}</td>
                    <td>{{ $feedback->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.feedbacks.edit', ['feedback' => $feedback]) }}">Редактировать</a><br>
                        <a href="">Удалить</a>
                    </td>
                </tr>
            @empty
                Отзывов нет
            @endforelse
            </tbody>
        </table>
        {{ $feedbacks->links() }}
    </div>
@endsection
