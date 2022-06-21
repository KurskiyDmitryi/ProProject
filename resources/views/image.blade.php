@extends('layout.app')
@section('content')
    <ul>
        @foreach($images as $image)
          <a href="{{route('image_id',$image->id)}}"><li>{{$image->name}}</li></a>
        @endforeach
    </ul>
@endsection
