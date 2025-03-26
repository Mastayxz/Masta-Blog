<?php

// app/Http/Controllers/AdController.php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::latest()->get();
        return view('dashboard.ads.index', compact('ads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'url' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('ads', 'public');

        Ads::create([
            'title' => $request->title,
            'image' => $imagePath,
            'url' => $request->url,
            'is_active' => true,
        ]);

        return back()->with('success', 'Iklan berhasil ditambahkan.');
    }

    public function create()
    {
        return view('dashboard.ads.create');
    }
}
