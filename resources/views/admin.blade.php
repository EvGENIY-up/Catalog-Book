@extends('layouts.app')

@section('content')
    <admin-component :categories="{{ json_encode($categories) }}" :authors="{{ json_encode($authors) }}"></admin-component>
@endsection
