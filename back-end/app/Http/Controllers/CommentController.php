<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized. Please login first.'], 401);
    }

    $validated = $request->validate([
        'content' => 'required|string',
    ]);

    try {
        $comment = Comment::create([
            'content' => $validated['content'],
            'post_id' => $postId,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Comment created successfully!',
            'comment' => $comment,
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function update(Request $request, $id)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized. Please login first.'], 401);
    }

    $comment = Comment::findOrFail($id);

    if ($comment->users_id !== $user->id) {
        return response()->json(['error' => 'You are not authorized to update this comment.'], 403);
    }

    $validated = $request->validate([
        'content' => 'required|string',
    ]);

    try {
        $comment->update([
            'content' => $validated['content'],
        ]);

        return response()->json([
            'message' => 'Comment updated successfully!',
            'comment' => $comment,
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function destroy($id)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized. Please login first.'], 401);
    }

    $comment = Comment::findOrFail($id);

    if ($comment->users_id !== $user->id) {
        return response()->json(['error' => 'You are not authorized to delete this comment.'], 403);
    }

    try {
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}