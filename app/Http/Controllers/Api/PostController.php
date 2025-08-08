<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->where('is_block', 0)
            ->paginate(10);
        
        $posts->getCollection()->transform(function ($post) {
            $post->description = \Str::limit($post->description, 512);
            return $post;
        });

        return response()->json($posts);
    }

    public function store(UpdatePostRequest $request)
    {
        $data = $request->validated();

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'contact_phone' => $request->contact_phone,
        ]);

        return response()->json($post, 200);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

}