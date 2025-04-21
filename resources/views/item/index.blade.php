@extends('layouts.main')
@section('content')
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Создать</a>
    <div>
        @foreach ($items as $item)
            <div><a href="{{ route('items.show', $item->id) }}">{{ $item->id }}. {{ $item->name }}</a></div>
        @endforeach
    </div>
@endsection
