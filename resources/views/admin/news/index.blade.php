@extends('layouts.admin')
@section('title')
    Список новостей @parent
@stop
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
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
                    <th>Заголовок</th>
                    <th>Категории</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Дата добавления</th>
                    <th>Дата изменения</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->categories->map(fn($category) => $category->title)->join(', ') }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>{{ $news->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a><br>
                            <a href="javascript:" class="delete" rel="{{ $news->id }}">Удалить</a>
                        </td>
                    </tr>
                @empty
                    Новостей нет
                @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
