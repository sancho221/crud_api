@extends('layouts.main')
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
        <a href="{{ route('categories.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
