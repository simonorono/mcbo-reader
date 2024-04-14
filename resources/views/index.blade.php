@extends('layouts.main')

@section('content')
    <ul>
        @foreach($items as $item)
            <li>
                <a href="{{ $item->link }}" target="_blank">
                    [{{ $item->pubDate->toDateString() }}] {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
