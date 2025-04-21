@extends('layouts.main')
@section('content')
    <form action="{{ route('items.update', $item->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" required>
        </div>
        <div class="mb-3">
            <label for="preview_text">Описание</label>
            <textarea name="preview_text" id="preview_text" cols="30" rows="10" class="form-control" required>{{ $item->preview_text }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $item->price }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id">Категория товара</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $item->category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
        <a href="{{ route('items.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
