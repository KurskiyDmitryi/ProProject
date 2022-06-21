@extends('layout.app')
@section('title','authors list')
@section('content')
    <ul>
@foreach($authors as $author)
            <li><b><a href="{{route('author_one', $author['id'])}}"> {{$author['name']}}</a></b></li>
        @endforeach

    </ul>
        @endsection
