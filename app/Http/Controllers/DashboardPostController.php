<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view("dashboard.posts.index",[
            'posts' =>  Post::where("user_id",auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create untuk menampilkan view
        return view("dashboard.posts.create",[
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store untuk memprosesnya
        $validateData = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',//1024(1mb)
            'category_id' => 'required',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            # code...
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success','Create New Post Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view("dashboard.posts.show",[
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //edit untuk menampilkan view
        return view("dashboard.posts.edit",[
            'post' => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $rules = [
            'title' => 'required|max:100',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            # code...
            $rules["slug"] ='required|unique:posts';
        }

        $validateData =$request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::where('id',$post->id)->update($validateData);

        return redirect('/dashboard/posts')->with('success','Update Post Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success','Deleted Post Success!');
    }

    public function checkSlug(Request $request)
    {    
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        /* Post adalah kelas,karenaa title di url maka bisa di ambil*/
        return response()->json(['slug' => $slug]);
    }
}

