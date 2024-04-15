@extends('layouts.main')

@section('content')
    <ul>
        @foreach($feed->items as $item)
            <li>
                <a href="{{ route('show-feed-item', $item) }}" target="_blank">
                    [{{ $item->pubDate->toDateString() }}] {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
