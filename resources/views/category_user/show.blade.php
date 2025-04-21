@extends('layouts.main')
@section('content')
    <div>
        <div>
            <div>{{ $cu->id }}. </div>
            @foreach ($cu->categories as $category)
                <div>Категория товара: {{ $category->name }} </div>
            @endforeach
            @foreach ($cu->users as $user)
                <div>Партнер: {{ $user->name }} </div>
                <div>Email: {{ $user->email }} </div>
            @endforeach
        </div>
        <a href="{{ route('category_users.edit', $cu->id) }}" class="btn btn-primary">Редактировать</a>
        <form action="{{ route('category_users.destroy', $cu->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
        <a href="{{ route('category_users.index') }}" class="btn btn-success">Назад</a>
    </div>
    </div>
@endsection
