@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Профиль пользователя {{ $user->name }}</h3>

    <form action="{{ route('admin_user_update', ['id' => $user->id]) }}" method="post">
        @csrf
        <input name="name" type="text" value="{{ $user->name }}"> Имя<br><br>
        <input name="email" type="email" value="{{ $user->email }}"> Эл. почта<br><br>
        @if($user->active)
            <input name="active" type="checkbox" checked> Активен<br><br>
        @else
            <input name="active" type="checkbox" > Активен<br><br>
        @endif
        @if($user->admin)
            <input name="admin" type="checkbox" checked> Статус админа<br><br>
        @else
            <input name="admin" type="checkbox"> Статус админа<br><br>
        @endif
        <input type="submit">
    </form>

@endsection
