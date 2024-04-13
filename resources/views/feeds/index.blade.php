@extends('layouts.main')

@section('content')
    <ul>
        @foreach($feeds as $feed)
            <li>
                <a href="{{ route('feeds.edit', $feed) }}">{{ $feed->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
