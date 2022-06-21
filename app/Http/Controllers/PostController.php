<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function post_one($id)
    {
        $post = Post::with('author')->find($id);
        $author_id = $post->author_id;
        $author = Author::find($author_id);
        $post->images = $post->getMedia('post_images');

        return view('post.post_one',['post'=>$post,'author'=>$author]);
    }
    function post_images_upload(Request $request,$id)
    {
       if($request->file == null)
       {
           return redirect()->route('post_one',['id'=>$id])->with('success','you need to choose file');
       }
        $post = Post::find($id);
        $post->addMedia($request->file('file'))->toMediaCollection('post_images');
        return redirect()->route('post_one',['id'=>$id]);
    }
    function post_images_delete(Request $request,$id)
    {
        $post = Post::find($id);

        $image = $post->getMedia('post_images');
        $image[$request->number - 1]->delete();
        return redirect()->route('post_one', ['id' => $id]);

    }


    public function store_js(Request $request)
    {
        if ($request->file('file')) {
            $post = Post::find($request->postId);
            $post->addMediaFromRequest('file')->toMediaCollection('post_images');
            $post->images = $post->getMedia('post_images');
        }
        return view('post.images', ['post' => $post]);
    }
}
