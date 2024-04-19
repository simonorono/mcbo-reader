@extends('layouts.main')

@section('content')
    <article class="prose mx-auto px-4">
        {!! $item->content !!}
    </article>
@endsection
