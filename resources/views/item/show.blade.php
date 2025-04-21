@extends('layouts.main')
@section('content')
    <div>
        <div>
            <div>{{ $item->id }}. {{ $item->name}}</div>
            <div>Описание: {{ $item->preview_text}}</div>
            <div>Цена: {{ $item->price }}</div>
            <div>Категория: {{ $category->name }}</div>
        </div>
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Редактировать</a>
            <form action="{{ route('items.destroy', $item->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            <a href="{{ route('items.index') }}" class="btn btn-success">Назад</a>
        </div>
    </div>
@endsection
