<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(20);
        // $posts = Post::simplepaginate(20);
        // $post = Post::find(1001);
        // $post = Post::findOrFail(1000);
        // $post = Post::findOrFail(1000);

        // if(!$post) {
        //     abort(404);
        // }

        // dd($post->title);

        // $user = User::where('email', 'moh@gmail.com')->get();
        // $user = User::where('email', 'moh@gmail.com')->first();

        // dd($user->name);


        return view('posts.index', compact('posts'));
    }

    public function search_posts(Request $request)
    {
        $posts = Post::where('title', 'like', '%'.$request->keyword.'%')
        ->orWhere('body','like', '%'. $request->keyword.'%')
        ->orWhere('views', $request->keyword)
        ->limit(10)
        ->get();
        return $posts;
    }
}
