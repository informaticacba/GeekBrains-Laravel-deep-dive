@extends('layouts.main')

@section('title')
    {{ $category->title }} @parent
@stop

@section('header')
    {{ $category->title }}
@endsection

@section('content')
    <a href="{{ route('news.index', ['categories' => $category->id]) }}" class="detail-category__link">Новости данной категории</a>
    <p class="detail-category__description">{!! $category->description !!}</p>
@endsection
