<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use AppModels\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Muhamad Rizky",
        "email" => "203040043@unpas.ac.id",
        "image" => "profile.jpg"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
// Halaman Single Post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'tite' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('categories/{category:slug}', function(Category $category) {
    return view('category', [
        'tite' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});
