@extends('layouts.main')

@section('title')
    {{ $news->title }} @parent
@stop

@section('header')
    {{ $news->title }}
@endsection

@section('content')
    <div class="detail-news">
        <div class="detail-news__section detail-news__info">
            <div class="detail-news__created-at">{{ $news->created_at }}</div>
            <div class="detail-news__author">{{ $news->author }}</div>
        </div>
        <div class="detail-news__section detail-news__category">
            Категории: {{ $categories }}
        </div>
        <div class="detail-news__section detail-news__source">
            Источник: <a href="{{ $news->source->link }}" target="_blank">{{ $news->source->title }}</a>
        </div>
        <p class="detail-news__description">{!! $news->description !!}</p>
    </div>
@endsection
