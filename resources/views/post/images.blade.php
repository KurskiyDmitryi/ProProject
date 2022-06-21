<h2 style="color:red">You can add {{3 - count($post->images)}} images</h2>
@if(count($post->images) < 3)
    <form method="post" name="test" enctype="multipart/form-data" id="js_upload">
        @csrf
        <div class="form-group">
            <input type="file" name="file">
            <input type="hidden" class="hidden" name="postId" value="{{$post->id}}">
            <input type="hidden" class="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <button type="button" id="uploadButton" class="btn btn-primary">Upload file</button>

    </form>
@endif
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner imagesCarusel">
        @foreach($post->images as $key => $image)
            <div class="carousel-item @if($key == 0) active @endif " style="left:800px;right:500px">
                <img src="{{$image->getUrl()}}" class="d-block w-40" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

