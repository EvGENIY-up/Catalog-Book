@extends('layouts.app')

@section('content')
    <home-component :book_prop="{{ json_encode($props) }}"></home-component>
@endsection
