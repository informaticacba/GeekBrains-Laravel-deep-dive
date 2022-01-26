@extends('layouts.main')

@section('title')
    Список новостей @parent
@stop

@section('header')
    {{ $news->title }}
@endsection

@section('content')
    <div class="detail-news">
        <div class="detail-news__info">
            <div class="detail-news__created-at">{{ $news->created_at }}</div>
            <div class="detail-news__author">{{ $news->author }}</div>
        </div>
        <div class="detail-news__category">Категория: {{ $news->categoryTitle }}</div>
        <p class="detail-news__description">{!! $news->description !!}</p>
    </div>
@endsection
