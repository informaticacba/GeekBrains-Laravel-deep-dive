@extends('layouts.admin')

@section('title')
    Список категорий @parent
@stop

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
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
                <th>Описание</th>
                <th>Картинка</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if(!empty($category->image) && @getimagesize(asset(\App\Constants::IMG_PATH . "/" . $category->image)))
                            <img height="100" src="{{ asset(\App\Constants::IMG_PATH . "/" . $category->image) }}" alt="">
                        @endif
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Редактировать</a><br>
                        <a href="">Удалить</a>
                    </td>
                </tr>
            @empty
                Категорий нет
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
