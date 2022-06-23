{{--{{dd($user)}}--}}
@if (empty($user->avatar[0]))
    <h1 style="color: red">You can choose avatar for this author</h1>
    <form method="post" enctype="multipart/form-data" name="form">
        @csrf
        <input type="file" name="file">
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="button" id="uploadButton" value="Ok">
    </form>
@endif
@if(isset($user->avatar[0]))
    <h1 style="color:yellow">You already chose avatar</h1>
    <img src="{{$user->avatar[0]->getUrl()}}">
    <form method="post" action="{{route('user_avatar_delete',$user->id)}}">
        @csrf
        <button class="btn btn-warning" type="submit" name="delete">delete</button>
    </form>
@endif
