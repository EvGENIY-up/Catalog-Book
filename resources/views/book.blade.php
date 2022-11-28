@extends('layouts.app')

@section('content')
    <single-book :book_info="{{ json_encode($book) }}"
        :admin="{{ json_encode(Auth::check() ? Auth::user()->is_admin : false) }}"
        :user_id="{{ json_encode(Auth::check() ? Auth::user()->id : false) }}"></single-book>
@endsection
