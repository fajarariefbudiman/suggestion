<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Blog';
        $category = null;
        $author = null;
        $categories = Category::all();

        try {
            $posts = Post::latest()
                ->paginate(10)
                ->withQueryString();

            $topArticles = Post::where('top_article', true)->latest()->take(5)->get();
            // dd($topArticles);

            return view('blog', [
                'title' => $title,
                'categories' => $categories,
                'category' => $category,
                'author' => $author,
                'posts' => $posts,
                'topArticles' => $topArticles,
            ])
            ->with('paginatorView', 'vendor.pagination.bootstrap-5');
        } catch (\Exception $th) {
            Log::error('Failed to fetch posts: ' . $th->getMessage());
            return redirect()->back()->withErrors(['message' => 'An error occurred while fetching posts. Please try again later.']);
        }
    }

    public function search_posts(Request $request)
    {
        try {
            $categories = Category::all();
            $latestArticles = Post::latest()->take(7)->get();
            $searchColumns = ['id', 'title', 'slug', 'excerpt', 'body'];
            $model = Post::query();
            $posts = $this->get_data_from_table($request, $model, $searchColumns, 5);
            return view('search-posts', [
                'title' => 'Search Post',
                'categories' => $categories,
                'posts' => $posts,
                'latestArticles' => $latestArticles
            ])->with('paginatorView', 'vendor.pagination.bootstrap-5');
        } catch (\Throwable $th) {
            Log::error('Failed to fetch posts: ' . $th->getMessage());
            return redirect()->back()->withErrors(['message' => 'An error occurred while fetching posts. Please try again later.']);
        }
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
    public function show($slug)
    {
        try {
            if (!is_string($slug)) {
                throw new \InvalidArgumentException("Invalid slug provided");
            }

            $post = Post::where('slug', $slug)->firstOrFail();

            $categories = Category::all();

            return view("post", [
                "title" => $post->slug,
                "post" => $post,
                "categories" => $categories
            ]);
        } catch (ModelNotFoundException $e) {
            Log::error('Post not found: ' . $slug . ' - ' . $e->getMessage());
            return redirect()->route('blog')->withErrors(['message' => 'Post not found']);
        } catch (\InvalidArgumentException $e) {
            Log::error('Invalid argument: ' . $e->getMessage());
            return redirect()->route('blog')->withErrors(['message' => 'Invalid post identifier']);
        } catch (\Throwable $th) {
            Log::error('Failed to fetch post: ' . $th->getMessage());
            return redirect()->route('blog')->withErrors(['message' => 'An error occurred while fetching the post. Please try again later.']);
        }
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
