<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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
            'title' => $request->title,
            'description' => $request->description,
            'numberOfLikes' => $request->numberOfLikes
        ]);
        $response = ['message' => "Created Successfully", 'post', $post];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $response = ['post' => $post];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update($request->all());
        $response = ['message' => "Updated Successfully", 'post' => $post];
        return response()->json($response);
    }

    /**
     * Return all comments belongs to a specific post
     */
    public function getComments($id)
    {
        $comments = Post::find($id)->comments;
        $response = ["comments" => $comments];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $response = ['message' => "Deleted Successfully", 'post' => $post];
        return response()->json($response);
    }
}
