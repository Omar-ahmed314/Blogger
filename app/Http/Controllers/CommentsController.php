<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        $response = ['comments' => $comments];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->postId,
            'comment' => $request->comment,
            'numberOfVotes' => $request->numberOfVotes
        ]);
        $response = ['message' => "Comment Created Successfully", 'comment' => $comment];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        $response = ['comment' => $comment];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request)
    {
        $comment = Comment::findOrFail($request->id);

        // assure the user_id is requested user
        if ($comment->user_id != Auth::user()->id)
            return response()->json(['message' => 'Unauthorized'], 403);

        $comment->update($request->validated());
        $response = ['message' => "Comment Updated Successfully", 'comment' => $comment];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        // assure the user_id is requested user
        if ($comment->user_id != Auth::user()->id)
            return response()->json(['message' => 'Unauthorized'], 403);

        $comment->delete();
        $response = ['message' => "Comment Deleted Successfully", 'comment' => $comment];
        return response()->json($response);
    }
}
