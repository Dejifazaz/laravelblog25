<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Add this line

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::latest('updated_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . Str::slug($request->title) . '.' . $request->image->extension(); // Use Str::slug() here
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blog.index')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->with('comments.user') // Eager load comments with user info
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        ]);

        return redirect()->route('blog.index')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();

        return redirect()->route('blog.index')
            ->with('message', 'Your post has been deleted!');
    }
}
