@extends('layouts.main')

@section('content')
    <ul class="list-disc">
        @foreach($items as $item)
            <li>
                <a href="{{ route('show-feed-item', $item) }}" target="_blank">
                    [{{ $item->feed->name }}][{{ $item->pubDate->toDateString() }}] {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
