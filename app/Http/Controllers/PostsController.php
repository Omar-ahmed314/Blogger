<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $response = ['posts' => $posts];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'number_of_likes' => $request->number_of_likes
        ]);
        $response = ['message' => "Created Successfully", 'post' => $post];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $post = Post::findOrFail($id);
            $response = ['post' => $post];
            return response()->json($response);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'The selected post id is invalid'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request)
    {
        $post = Post::findOrFail($request->id);

        // assure that post belongs to the requested user
        if ($post->user_id != Auth::user()->id)
            return response()->json(['message' => 'Unauthorized'], 403);

        $post->update($request->validated());
        $response = ['message' => "Updated Successfully", 'post' => $post];
        return response()->json($response);
    }

    /**
     * Return all comments belongs to a specific post
     */
    public function getComments($id)
    {
        try {
            $comments = Post::findOrFail($id)->comments;
            $response = ["comments" => $comments];
            return response()->json($response);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'The selected post id is invalid'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::findOrFail($id);

            // assure the user_id is requested user
            if ($post->user_id != Auth::user()->id)
                return response()->json(['message' => 'Unauthorized'], 403);

            $post->delete();
            $response = ['message' => "Deleted Successfully", 'post' => $post];
            return response()->json($response);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'The selected post id is invalid'], 404);
        }
    }
}
