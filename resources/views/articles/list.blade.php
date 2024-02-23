@extends('layouts.app')

@section('content')
    @foreach ($data as $article)
        <li>{{ $article->name }} - Descargas: {{ $article->downloads->count() }}</li>
    @endforeach
@endsection
