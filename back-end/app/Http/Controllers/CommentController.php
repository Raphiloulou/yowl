<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request, $userId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', 
        ]);
        try {
            $comment = Comment::create([
                'content' => $validated['content'],
                'post_id' => $userId,
                'user_id' => $validated['user_id'], 
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
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);

        if ($comment->users_id !== $request->user_id) {
            return response()->json(['error' => 'You are not authorized to update this comment.'], 403);
        }

        try {
            $comment->update(['content' => $validated['content']]);
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
        $comment = Comment::findOrFail($id);

        if ($comment->users_id !== Auth::id()) {
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
