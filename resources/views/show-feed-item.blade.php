@extends('layouts.main')

@section('content')
    <article class="prose mx-auto">
        {!! $item->content !!}
    </article>
@endsection
