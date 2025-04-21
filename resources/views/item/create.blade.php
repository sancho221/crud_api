@extends('layouts.main')
@section('content')
    <form action="{{ route('items.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="preview_text">Описание</label>
            <textarea name="preview_text" id="preview_text" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="mb-3">
            <label for="category_id">Категория товара</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('items.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
