@extends('layouts.main')
@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Создать</a>
    <div>
        @foreach ($users as $user)
            <div><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}. {{ $user->name }}</a></div>
        @endforeach
    </div>
@endsection
