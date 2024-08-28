<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"]);

Route::get('/categories/{slug}', [CategoryController::class, "get_category_by_slug"])
    ->where('slug', '[A-Za-z0-9-_]+')
    ->name('get-category-by-slug');

Route::get('/blog', [PostController::class, "index"]);
Route::get('/blog/search-results', [PostController::class, "search_posts"])->name('search-posts');

Route::get('/blog/{slug}', [PostController::class, "show"])
    ->where('slug', '[A-Za-z0-9-_]+')
    ->name('post-by-slug');

require __DIR__ . '/auth.php';
