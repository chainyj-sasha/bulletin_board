@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Список всех объявлений</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Текст</th>
            <th>Дата создания</th>
            <th>Active</th>
        </tr>
        @foreach($ads as $ad)
            <tr>
                <td>{{ $ad->id }}</td>
                <td>{{ $ad->text }}</td>
                <td>{{ $ad->created_at }}</td>
                    @if($ad->active)
                        <td><a href="{{ route('admin_active_ad', ['id' => $ad->id]) }}">Активно</a></td>
                    @else
                        <td><a href="{{ route('admin_active_ad', ['id' => $ad->id]) }}">Отклонено</a></td>
                    @endif
            </tr>
        @endforeach
    </table>

@endsection
