@extends('layouts.main')
@section('content')
    <div>
        <div>{{ $user->id }}. {{ $user->name }}</div>
        <div>Email: {{ $user->email }}</div>
        <div>Роль: {{ $user->role == 'admin' ? 'Админ' : 'Партнер'}}</div>
        <div>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Редактировать</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            <a href="{{ route('users.index') }}" class="btn btn-success">Назад</a>
        </div>
    </div>
@endsection
