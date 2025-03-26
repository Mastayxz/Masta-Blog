<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('dashboard.post.index', compact('posts'));
    }

    public function publicIndex()
    {
        // $posts = \App\Models\Post::latest()->paginate(6);
        $posts = Post::latest()->paginate(6);
        $categories = Category::all();
        $recommendedPosts = Post::inRandomOrder()->limit(3)->get();
        $ads = Ads::where('is_active', true)->get(); // tambahkan ini
        // dd($ads);

        return view('pages.posts.index', compact('posts', 'categories', 'recommendedPosts', 'ads'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        $slug = Str::slug($request->title);
        $excerpt = Str::limit(strip_tags($request->body), 150);

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'excerpt' => $excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');

    }

    public function show($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        // Rekomendasi artikel (ambil 5 artikel terbaru lainnya)
        $recommendedPosts = Post::latest()->take(5)->get();
        $ads = Ads::where('is_active', true)->get(); // tambahkan ini
        return view('dashboard.post.show', compact('post', 'categories', 'recommendedPosts', 'ads'));

    }

    public function publicShow($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // Ambil semua kategori untuk sidebar
        $categories = Category::all();
        $ads = Ads::where('is_active', true)->latest()->get(); // <-- ini penting
        // Rekomendasi artikel (ambil 5 artikel terbaru lainnya)
        $recommendedPosts = Post::latest()->take(5)->get();
        return view('pages.posts.show', compact('post', 'categories', 'recommendedPosts', 'ads'));
    }


    public function edit($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image); // hapus gambar lama
            }
            $imagePath = $request->file('image')->store('posts', 'public');
        } else {
            $imagePath = $post->image; // pakai gambar lama
        }

        $slug = Str::slug($request->title);
        $excerpt = Str::limit(strip_tags($request->body), 150);

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'excerpt' => $excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diupdate!');
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Hapus file dari storage jika ada
        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        // Hapus data post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $categorySlug = $request->input('category');

        $category = null;

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
        }

        $posts = Post::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('body', 'like', "%{$keyword}%");
                });
            })
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category->id);
            })
            ->latest()
            ->paginate(6);

        $categories = Category::all();
        $recommendedPosts = Post::inRandomOrder()->limit(3)->get();
        $ads = \App\Models\Ads::where('is_active', true)->get();

        return view('pages.posts.index', compact('posts', 'categories', 'recommendedPosts', 'ads', 'category'));
    }

}
