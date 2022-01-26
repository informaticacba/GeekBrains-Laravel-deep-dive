@extends('layouts.main')

@section('title')
    Список категорий @parent
@stop

@section('header')
    Список категорий
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse ($categories as $category)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                            <div class="card-body">
                                <p>
                                    <a href="{{ route('categories.show', ['id' => $category->id]) }}">
                                        <b>{{ $category->title }}</b>
                                    </a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.index', ['category' => $category->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Новости данной категории</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>Категорий нет</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
