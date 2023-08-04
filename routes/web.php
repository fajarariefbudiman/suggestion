<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\UserController;
// use App\Models\Post;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class,"index"]);

Route::get('/categories', [CategoryController::class,"index"]);

Route::get('/blog', [PostController::class,"index"]);

Route::get('/blog/{post:slug}', [PostController::class,"show"]);

Route::get("/login",[LoginController::class,"index"])->name("login")->middleware("guest");

Route::post("/login",[LoginController::class,"authenticate"]);

Route::post("/logout",[LoginController::class,"logout"]);

Route::get("/register",[RegisterController::class,"index"])->middleware("guest");

Route::post("/register",[RegisterController::class,"store"]);

Route::get("/dashboard",function ()  {
      return view("dashboard.index");   
})->middleware("auth");

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,"checkSlug"])->middleware("auth");

Route::resource('/dashboard/posts',DashboardPostController::class)->middleware("auth");
//except(kecuali)
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');




// Route::get('/authors/{author:username}',[UserController::class,"show"]);
// Route::get('/categories/{category:slug}',[CategoryController::class,"show"]);
