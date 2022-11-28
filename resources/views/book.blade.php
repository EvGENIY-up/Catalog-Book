@extends('layouts.app')

@section('content')
    <single-book :book_info="{{ json_encode($book) }}"
        :user_id="{{ json_encode(Auth::check() ? Auth::user()->id : false) }}"
        :admin="{{ json_encode(Auth::check() ? Auth::user()->is_admin : false) }}"
        :categories="{{ json_encode(Auth::check() ? $categories : false) }}"
        :authors="{{ json_encode(Auth::check() ? $authors : false) }}"></single-book>
@endsection
