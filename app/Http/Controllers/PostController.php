<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostPublish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title)
        ]);

        $post->notify(new PostPublish);
        return back();
    }
}
