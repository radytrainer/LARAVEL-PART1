<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('text', function() {
    return "Hello PNC Laravel 8";
});

Route::get('person/{name}', function($name) {
    return "Good morning ". $name;
});

Route::get('person/{name}/{age}', function($name, $age) {
    return "Good morning ". $name . " & my age : ". $age;
});

Route::get('posts', function() {
    return Post::all();
});

Route::get('posts/{id}', function($id) {
    return Post::findOrFail($id);
});


Route::post('posts', function(Request $request) {
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();

    return response()->json(['message' => "Post Created"], 201);
});

Route::put('posts/{id}', function(Request $request, $id) {
    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();

    return response()->json(['message' => "Post Updated"], 200);
});

Route::delete('posts/{id}', function($id) {
    return Post::destroy($id);
});


Route::fallback(function() {
    return "Your Route Laravel Not Found";
});