@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <livewire:load-posts :key="'home'"/>
@endsection
