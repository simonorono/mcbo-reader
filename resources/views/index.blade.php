@extends('layouts.main')

@section('content')
    <ul>
        @foreach($items as $item)
            <li>
                <a href="{{ route('show-feed-item', $item) }}" target="_blank">
                    [{{ $item->feed->name }}][{{ $item->pubDate->toDateString() }}] {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
