@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Список всех юзеров</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Active</th>
            <th>Админ</th>
            <th>Просмотр</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @if($user->active)
                    <td>Активен</td>
                @else
                    <td>Забанен</td>
                @endif
                @if($user->admin)
                    <td>Админ</td>
                @else
                    <td>Юзер</td>
                @endif
                <td><a href="{{ route('admin_show_user', ['id' => $user->id]) }}">Профиль</a></td>
            </tr>
        @endforeach

    </table>

@endsection

