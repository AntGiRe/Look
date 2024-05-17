@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-post-list :posts="$posts" />
@endsection
