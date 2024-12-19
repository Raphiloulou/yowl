<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id'
        ]);
    
            $validated['user_id'] = Auth::id();  
            $post = Post::create($validated);
    
            return response()->json([
                'message' => 'Post created successfully!',
                'post' => $post,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    
        if (Auth::id() !== $post->users_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        $post->update($validated);
    
        return response()->json([
            'message' => 'Post updated successfully!',
            'post' => $post,
        ]);
    }
    
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