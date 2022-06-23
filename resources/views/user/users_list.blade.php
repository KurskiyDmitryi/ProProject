@extends('layout.app')
@section('title','authors list')
@section('content')
    <ul>
@foreach($users as $user)
            <li><b><a href="{{route('user_one', $user['id'])}}"> {{$user['name']}}</a></b></li>
        @endforeach

    </ul>
        @endsection
