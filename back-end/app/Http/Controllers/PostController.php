<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index($categoryId = null){
        $posts = $categoryId
            ? Post::where('category_id', $categoryId)->get()
            : Post::all();

        return view('posts.index', compact('posts'));
    }
    public function create()
{
    $categories = Category::all();
    return view('posts.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post créé avec succès!');
}
}
