@extends('layouts.main')
@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="role">Роль</label>
            <select name="role" id="role" class="form-control">
                <option value="partner">Партнер</option>
                <option value="admin">Админ</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('users.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
