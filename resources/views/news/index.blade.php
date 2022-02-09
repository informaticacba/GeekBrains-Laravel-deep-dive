@extends('layouts.main')

@section('title')
    Список новостей @parent
@stop

@section('header')
    Список новостей
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse ($newsList as $news)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news['title'] }}</text>
                            </svg>
                            <div class="card-body">
                                <p>
                                    <a href="{{ route('news.show', ['news' => $news['id']]) }}">
                                        <b>{{ $news['title'] }}</b>
                                    </a>
                                </p>
                                <p><b>Автор:</b> {{ $news['author'] }}</p>
                                <p><b>Категории:</b> {{ $news['categories']->map(fn($category) => $category->title)->join(', ') }}</p>
                                <p class="card-text">{{ $news->short_description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.show', ['news' => $news->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                                    </div>
                                    <small class="text-muted">Дата добавления: <br>{{ $news->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>Записей нет</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
