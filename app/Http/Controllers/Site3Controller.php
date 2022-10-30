<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site3Controller extends Controller
{
    public function index()
    {
        $name = 'Mohammed';
        $age = 28;

        $posts = [
            ['id' => 1, 'title' => 'Post 1', 'content' => 'lorem'],
            ['id' => 2, 'title' => 'Post 2', 'content' => 'lorem'],
            ['id' => 3, 'title' => 'Post 3', 'content' => 'lorem'],
            ['id' => 4, 'title' => 'Post 4', 'content' => 'lorem'],
        ];

        var_dump($posts);

        // compact('name', 'age')
        // [
        //     'name' => $name,
        //     'age' => $age
        // ]

        // return view('home')->with('name', $name)->with('age', $age);
        return view('home', compact('name', 'age', 'posts'));
        // return view('home', [
        //     'myname' => $name,
        //     'ageeeeee' => $age
        // ]);
    }
}
