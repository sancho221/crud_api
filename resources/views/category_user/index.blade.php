@extends('layouts.main')
@section('content')
    <a href="{{ route('category_users.create') }}" class="btn btn-primary mb-3">Создать</a>
    <div>
        @foreach ($category_users as $cu)
            <div><a href="{{ route('category_users.show', $cu->id) }}">{{ $cu->id }}. {{ $cu->category_id }} | {{ $cu->user_id }}</a></div>
        @endforeach
    </div>
@endsection
