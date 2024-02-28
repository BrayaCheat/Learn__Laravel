<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getData()
    {
        $item = Post::all();
        return response()->json($item);
    }

    public function getDataById($id)
    {
        $post = Post::find($id);

        // Check if user exists
        if (!$post) {
            // If user not found, return a response indicating failure
            return response()->json(['message' => 'Post not found'], 404);
        }

        // If user found, return user data
        return response()->json($post, 200);
    }

    public function createData(Post $post)
    {
        $post = request()->validate([
            'title' => 'required',
            'article' => 'required'
        ]);

        Post::create($post);

        return response()->json(['message' => 'Post Created!'], 200);
    }

    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'article' => 'required'
        ]);
        $post = Post::findOrFail($id);
        if ($post) {
            // Update the user with validated data
            $post->update($validatedData);
            return response()->json(['message' => 'Post Updated!'], 300);
        } else {
            return response()->json(['message: ' => 'Product not found'], 404);
        }
    }

    public function deleteData($id)
    {
        // Find the user by ID
        $post = Post::findOrFail($id);

        // Delete the user
        $post->delete();

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Post Deleted!'], 200);
    }
}
