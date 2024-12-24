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
        if (Auth::loginUsingId($request["user_id"]) === false) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = $request["user_id"];

        $post = Post::create($validated);
        $post->load(['user', 'category']);

        $post = new PostResource($post);
        return response()->json(["data" => $post]);
    }


    public function update(Request $request, Post $post)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($validated);
        $post->load(['user', 'category']);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        $post->delete();

        return response()->json(['message' => 'Post supprimé avec succès.'], 200);
    }

    public function testSession()
    {
        return response()->json([
            'authenticated' => Auth::check(),
            'user' => Auth::user(),
        ]);
    }
<<<<<<< HEAD
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
    
        if (Auth::id() !== $post->users_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $post->delete();
    
        return response()->json(['message' => 'Post deleted successfully!']);
    }
    public function likePost($id)
    {

    $post = Post::find($id);

    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    $post->likes += 1;
    $post->save();

    return response()->json([
        'message' => 'Post liked successfully',
        'post' => $post
    ]);
    }

}    
=======
}
>>>>>>> 9de989535118f3489cce39b8d1444aab8805cddc
