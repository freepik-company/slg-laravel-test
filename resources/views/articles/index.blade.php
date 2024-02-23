@extends('layouts.app')

@section('content')
    <h1>Listado de 10 Artículos</h1>
    <ul>
        @foreach($articles as $article)
            <li>{{ $article->name }}</li>
            <ul>
                @foreach($article->tags()->get() as $tag)
                    <li>Tag: {{ $tag->name }}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
@endsection
