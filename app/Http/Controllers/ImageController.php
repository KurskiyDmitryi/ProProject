<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function view()
    {
        $images = Image::all();
        return view('image', ['images' => $images]);
    }

    function image_id($id)
    {
        $image = Image::find($id);
        return view('image_id', ['image' => $image]);
    }

    public function store_js(Request $request)
    {

        request()->validate([
            'file' => 'required|mimes:doc,docx,pdf,txt,jpeg|max:2048',
        ]);

        if ($request->file('file')) {

            $image = Image::find($request->id);
            $image->addMedia($request->file('file'))->toMediaCollection('train_images');
            $image->images = $image->getMedia('train_images');

            return view('image_response',['image'=>$image]);
            }


    }
}
