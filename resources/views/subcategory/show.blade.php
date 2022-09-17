@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Список подкатегорий:</h3>

    <ul>
        @foreach($subcategories as $subcategory)

            <li><a href="{{ route('show_ads', ['id' => $subcategory->id]) }}">{{ $subcategory->name }}</a></li>

        @endforeach
    </ul>

@endsection
