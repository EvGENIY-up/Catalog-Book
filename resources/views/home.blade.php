@extends('layouts.app')

@section('content')
    <home-component :book_prop="{{ json_encode($props) }}" :user="{{ json_encode(Auth::check()) }}"
        :categories="{{ json_encode(Auth::check() ? $categories : false) }}"
        :authors="{{ json_encode(Auth::check() ? $authors : false) }}">
    </home-component>
@endsection
