@extends('layouts.main')
@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('categories.index') }}" class="btn btn-success">Назад</a>
    </form>
@endsection
