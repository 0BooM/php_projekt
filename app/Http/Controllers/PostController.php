<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $query = Post::with(['user', 'media'])
        ->where('published_at', '<=', now())
        ->withCount('likes')->latest();
        if($user && !$user->isAdmin()){
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->paginate(6);
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        //$image = $data['image'];
        //unset($data['image']);
        $data['user_id'] = Auth::id();

        //$imagePath = $image->store('posts', 'public');
       // $data['image'] = $imagePath;

        $post = Post::create($data);
        $post->addMediaFromRequest('image')
            ->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action');
        }
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action');
        }

        $data = $request->validated();
        $post->update($data);

        if ($data['image'] ?? false){
            $post->addMediaFromRequest('image')
                ->toMediaCollection();
        }
        if(Auth::user()->isAdmin()){
            return redirect()->route('dashboard');
        }
        return redirect()->route('post.myPosts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    if($post->user_id !== Auth::id() && !Auth::user()->isAdmin()){
        abort(403, 'Unauthorized action');
    }
        $post->delete();
        return redirect()->route('dashboard');
    }

    public function category(Category $category)
    {
        $user = auth()->user();

        $query = $category->posts()
        ->where('published_at', '<=', now())
        ->with(['user', 'media'])->
        withCount('likes')->latest();

        if($user && !$user->isAdmin()){
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }
        $posts = $query->paginate(6);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function myPosts()
    {
        $user = auth()->user();
        $posts = $user->posts()
            ->with(['user', 'media'])->withCount('likes')->latest()->paginate(6);
        return view('post.index', [
            'posts' => $posts,
        ]);
    }
}
