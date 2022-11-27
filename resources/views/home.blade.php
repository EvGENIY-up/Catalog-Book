@extends('layouts.app')

@section('content')
    <home-component :book_prop="{{ json_encode($props) }}" :user="{{ json_encode(Auth::check()) }}"></home-component>
@endsection
