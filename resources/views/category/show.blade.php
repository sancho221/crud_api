@extends('layouts.main')
@section('content')
    <div>
        <div>{{ $category->id }}. {{ $category->name }}</div>
        <div>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Редактировать</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            <a href="{{ route('categories.index') }}" class="btn btn-success">Назад</a>
        </div>
    </div>
@endsection
