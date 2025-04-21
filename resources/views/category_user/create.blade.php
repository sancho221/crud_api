@extends('layouts.main')
@section('content')
    <form action="{{ route('category_users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="category_id">Категория товара</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id">Пользователь</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('category_users.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
