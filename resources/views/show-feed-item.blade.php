@extends('layouts.main')

@section('content')
    <article class="prose mx-auto px-4">
        <h2 class="text-xl py-4">{{ $item->title }}</h2>

        {!! $item->content !!}
    </article>
@endsection
