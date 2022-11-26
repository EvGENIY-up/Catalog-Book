@extends('layouts.app')

@section('content')
    <single-book :book_info="{{ json_encode($book) }}"></single-book>
@endsection
