<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $comment = Comment::create([
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
    public function update(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->update($request->all());
        $response = ['message' => "Comment Updated Successfully", 'comment' => $comment];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $response = ['message' => "Comment Deleted Successfully", 'comment' => $comment];
        return response()->json($response);
    }
}
