<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = '';
        if (request("category")) {
            # code...
            $category = Category::firstWhere("slug",request("category"));
            $title = " in " . $category->name;
        }
        if (request("author")) {
            # code...
            $author = User::firstWhere("username",request("author"));
            $title = " by " . $author->name;
        }


        return view("blog",[
            "title" => "All Post" . $title,
            // "posts" => Post::all()
            "posts" => Post::latest()->Filter(request(["search","category","author"]))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view("post",[
            "title" => $post->slug,
            "post" => $post
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
