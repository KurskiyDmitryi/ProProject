<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function user_list()
    {
        $users = User::all();
        return view('user.users_list', ['users' => $users]);
    }

    function user_one($id)
    {
        $user = User::find($id);
        $user->avatar = $user->getmedia('avatars');
        return view('user.user_one', ['user' => $user]);
    }

//    function author_image_download($id, Request $request)
//    {
//        $path = $request->file('file')->store('app/public', 'public');
//
//        $user = Author::find($id);
//        $user->thumbnail = $path;
//        $user->save();
//
//        return view('user.author_one', ['user' => $user]);
//    }

//    function second_way_upload($id, Request $request)
//    {
//        if ($request->file == null) {
//            return redirect()->route('user_one', ['id' => $id])->with('success', 'you need to choose file');
//        }
//        $user = User::find($id);
//        $user->addMedia($request->file('file'))->toMediaCollection('avatars');
//        return redirect()->route('user_one', ['id' => $id]);
//    }

    function user_avatar_delete($id)
    {
        $user = User::find($id);
        $user->avatar = $user->getMedia('avatars');
        $user->avatar[0]->delete();
        return redirect()->route('user_one', ['id' => $id]);

    }

    function store_js(Request $request)
    {
        if ($request->file('file')) {
            $user = User::find($request->id);
            $user->addMedia($request->file('file'))->toMediaCollection('avatars');
            $user->avatar = $user->getMedia('avatars');
        }
        return view('user.user_image', ['user' => $user]);
    }
}
