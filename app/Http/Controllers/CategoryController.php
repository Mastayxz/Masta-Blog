<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->latest()->paginate(10);

        $recommendedPosts = Post::latest()->take(5)->get(); // Atau cara lain sesuai preferensi
        $categories = Category::all();
        $ads = Ads::where('is_active', true)->get(); // tambahkan ini
        // dd($ads);

        return view('pages.posts.index', compact('posts', 'categories', 'recommendedPosts', 'ads', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',

        ]);

        $slug = Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description
        ]);

        return back()->with('success', 'Category berhasil ditambahkan.');
    }

}
