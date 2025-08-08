<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {
        $resources = $this->model::paginate(10);
        return view('dashboard.posts.index', compact('resources'));
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'post' => $this->model,
            'users' => User::all(),
        ]);
    }

    public function store(UpdatePostRequest $request)
    {
        $data = $request->validated();
        $post = $this->model::create($data);
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'users' => User::all(),
        ]);
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        if ($request->password == null) {
            unset($data['password']);
        }
        $post->update($data);
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function block($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('admin.posts.index')->with('error', 'Post not found.');
        }

        $post->is_block = $post->is_block ? 0 : 1;
        $post->save();

        $message = $post->is_block ? 'Post blocked successfully.' : 'Post unblocked successfully.';
        return redirect()->route('admin.posts.index')->with('success', $message);
    }
}
