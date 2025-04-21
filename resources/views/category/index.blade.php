@extends('layouts.main')
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Создать</a>
    <div>
        @foreach ($categories as $category)
            <div><a href="{{ route('categories.show', $category->id) }}">{{ $category->id }}. {{ $category->name }}</a></div>
        @endforeach
    </div>
@endsection
