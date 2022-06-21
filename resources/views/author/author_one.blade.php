@extends('layout.app')
@section('title','author one')
@section('content')

    <h1>{{$author['name']}}</h1>

<div id="include_image">
    @include('author.author_image',['author'=>$author])
</div>
    <ul>
        <h1 style="color: blue">Avaible Post:</h1>
        @foreach($author->posts as $post)
            <a href="{{route('post_one',$post->id)}}"><h2>{{$post->title}}</h2></a>
        @endforeach
    </ul>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '#uploadButton', function() {
                var oldForm = document.forms.form;
                var formData = new FormData(oldForm);
                var response = $.ajax({
                    type:'POST',
                    url: "{{ route('store_author')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: "html",
                });
                response.done(function (result){
                    var include = $('#include_image');
                    include.html('');
                    include.append(result);
                })
            });

        });
    </script>
@endpush
