<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        // var_dump($posts);
        return view('post',['posts' => $posts]);
    }

    public function store(Request $request )  {
        // var_dump($request->isMethod('post'));
        if ($request->isMethod('post')) {
            $name = $request->input('name');
            $description = $request->input('description');
            var_dump($name);
            var_dump($description);
            $newPost = Post::create(array(
                'name' => $name,
                'description' => $description
            ));
            return redirect('/posts')->with('success','Post creer');
        }
        return view('createPost');
    }
}
