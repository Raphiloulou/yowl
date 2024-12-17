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
    try {
        Post::create($validated);
        return response()->json(['message' => 'Post created successfully!'], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }

    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post créé avec succès!');
}
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
    ]);

     $post = Post::findOrFail($id);

  
    if (Auth::id() !== $post->users_id) {
        return response()->json([
            'message' => 'Vous n\'êtes pas autorisé à modifier ce post.'
        ], 403);
    }

    $post->update([
        'title'   => $validated['title'],
        'content' => $validated['content'],
    ]);

    return response()->json([
        'message' => 'Post mis à jour avec succès !',
        'post'    => $post
    ], 200);
}
public function destroy($id)
{
    $post = Post::findOrFail($id);

    $post->delete();

    return response()->json([
        'message' => 'Catégorie supprimée avec succès.',
    ]);
}
}

