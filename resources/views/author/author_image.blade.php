{{--{{dd($author)}}--}}
@if (empty($author->avatar[0]))
    <h1 style="color: red">You can choose avatar for this author</h1>
    <form method="post" enctype="multipart/form-data" name="form">
        @csrf
        <input type="file" name="file">
        <input type="hidden" name="id" value="{{$author->id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="button" id="uploadButton" value="Ok">
    </form>
@endif
@if(isset($author->avatar[0]))
    <h1 style="color:yellow">You already chose avatar</h1>
    <img src="{{$author->avatar[0]->getUrl()}}">
    <form method="post" action="{{route('author_avatar_delete',$author->id)}}">
        @csrf
        <button class="btn btn-warning" type="submit" name="delete">delete</button>
    </form>
@endif
