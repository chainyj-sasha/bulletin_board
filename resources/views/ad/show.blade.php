@extends('layouts.main')

@section('title', $title)

@section('content')

    <h3>Список объявлений: </h3>

    <ul>
        @foreach($ads as $ad)

            <li>{{ $ad->text }}</li>

        @endforeach
    </ul>

    @if(auth()->check())
        <h3>Добавить свое объявление: </h3>

        <form action="{{ route('ad_store') }}" method="POST">
            @csrf
            <textarea name="text" id="" cols="30" rows="10"></textarea> Введите текст объявления<br><br>
            <input type="hidden" name="subcategoryId" value="{{ $subcategoryId }}">
            <input type="submit">
        </form>
    @else
        <p>Только зарегистрированные пользователи могут добавлять объявления</p>
    @endif



@endsection
