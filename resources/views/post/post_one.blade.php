@extends('layout.app')
@section('title')
    {{$author->name}}
@endsection
@section('content')
    <h1><i>Author</i></h1>
    <h2><i>Title</i> : {{$post->title}}</h2>
    <h2><i>Description</i> : {{$post->description}}</h2>
    <h2><i>Text</i> : {{$post->text}}</h2>
    <div id="change_list">



    <div>

        <div id="im">
            @include('post.images', ['post' => $post])
        </div>

</div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@if(count($post->images) >= 1)
    <form method="post" action="{{route('post_images_delete',$post->id)}}">
        @csrf
        <label for="Number">Choose number of image what you want to delete</label>

            <input type="range" min="1" max="{{count($post->images)}}" name="number">
        <button class="btn btn-warning" type="submit" name="delete">delete</button>
    </form>
@endif
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '#uploadButton', function() {
                var oldForm = document.forms.test;
                var formData = new FormData(oldForm);


                var response = $.ajax({
                    type:'POST',
                    url: "{{ url('store')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: "html",
                });
                response.done(function (result){
                    var carusel = $('#im');
                    carusel.html('');
                    carusel.append(result);
                })
            });

        });
    </script>
@endpush
