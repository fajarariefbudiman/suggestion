<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("categories", [
            "title" => "categories",
            // "categories" => Category::all()
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
    public function get_category_by_slug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        $posts = Post::where('category_id', $category->id)->with('author', 'category')->paginate(7);

        $moreCategories = Category::where('slug', '!=', $category->slug)->get();

        $otherPostCategories = [];

        foreach ($moreCategories as $moreCategory) {
            $otherPostCategories[$moreCategory->name] = Post::where('category_id',$moreCategory->id)
            ->with('author','category')
            ->take(5)
            ->get();
        }
         return view('categories', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
            'moreCategories' => $moreCategories,
            'otherPostCategories' => $otherPostCategories
        ])
            ->with('paginatorView', 'vendor.pagination.bootstrap-5');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
