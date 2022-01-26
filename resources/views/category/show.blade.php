@extends('layouts.main')

@section('title')
    Список категорий @parent
@stop

@section('header')
    {{ $category->title }}
@endsection

@section('content')
    <a href="{{ route('news.index', ['category' => $category->id]) }}" class="detail-category__link">Новости данной категории</a>
@endsection
