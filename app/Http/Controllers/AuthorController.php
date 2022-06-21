<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AuthorController extends Controller
{
    function author_list()
    {
        $authors = Author::all();
        return view('author.authors_list', ['authors' => $authors]);
    }

    function author_one($id)
    {
        $author = Author::find($id);
        $author->avatar = $author->getmedia('avatars');
        return view('author.author_one', ['author' => $author]);
    }

//    function author_image_download($id, Request $request)
//    {
//        $path = $request->file('file')->store('app/public', 'public');
//
//        $author = Author::find($id);
//        $author->thumbnail = $path;
//        $author->save();
//
//        return view('author.author_one', ['author' => $author]);
//    }

    function second_way_upload($id, Request $request)
    {
        if ($request->file == null) {
            return redirect()->route('author_one', ['id' => $id])->with('success', 'you need to choose file');
        }
        $author = Author::find($id);
        $author->addMedia($request->file('file'))->toMediaCollection('avatars');
        return redirect()->route('author_one', ['id' => $id]);
    }

    function author_avatar_delete($id)
    {
        $author = Author::find($id);
        $author->avatar = $author->getMedia('avatars');
        $author->avatar[0]->delete();
        return redirect()->route('author_one', ['id' => $id]);

    }

    function store_js(Request $request)
    {
        if ($request->file('file')) {
            $author = Author::find($request->id);
            $author->addMedia($request->file('file'))->toMediaCollection('avatars');
            $author->avatar = $author->getMedia('avatars');
        }
        return view('author.author_image', ['author' => $author]);
    }

}
