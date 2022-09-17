@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Список доступных категорий:</h3>

    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('subcats_show', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

@endsection

