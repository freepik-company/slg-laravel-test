
@extends('layouts.app')

@section('content')
    <h1>Welcome to your profile {{ auth()->user()?->name }}</h1>
@endsection
