<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->get();
        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);
        $post->load(['user', 'category']);

        return response()->json([
            'message' => 'Post créé avec succès',
            'post' => new PostResource($post),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        if (Auth::id() !== $post->user_id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($validated);
        $post->load(['user', 'category']);

        return response()->json([
            'message' => 'Post mis à jour avec succès',
            'post' => new PostResource($post),
        ]);
    }

    public function destroy(Post $post)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }
    
        $userId = Auth::id();
        if ($userId !== $post->user_id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }
    
        $post->delete();
    
        return response()->json(['message' => 'Post supprimé avec succès'], 200);
    }
    



public function likePost(Request $request, $id)
{
    if (Auth::loginUsingId($request["user_id"]) === false) {
        return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
    }

    $post = Post::findOrFail($id);
    $userId = $request["user_id"];

    if ($post->likes()->where('user_id', $userId)->exists()) {
        return response()->json(['error' => 'Vous avez déjà liké ce post.'], 403);
    }

    $post->likes()->create(['user_id' => $userId]);

    return response()->json(['message' => 'Post liké avec succès.', 'post' => $post]);
}

}
