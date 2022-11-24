<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::latest('id')->paginate(20);
        // $posts = Post::orderBy('id', 'desc')->paginate(20);
        $posts = Post::orderByDesc('id')->paginate(5);
        $posts_count = Post::count();
        // dd($posts_count);
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

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // 1 Validation

        // 2 File Upload
        $img_name = time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);

        // 3 Save to DataBase
        // $post = new Post();
        // $post->title = $request->title;
        // $post->image = $img_name;
        // $post->body = $request->body;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'image' => $img_name,
            'body' => $request->body,
            // 'body' => strip_tags($request->body),
        ]);

        // 4 Redirect to Another Page
        // dd($request->all());
        return redirect()->route('posts.index')->with('msg', 'Post added successfully');
    }
}
