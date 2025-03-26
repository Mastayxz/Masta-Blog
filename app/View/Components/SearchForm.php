<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\Category;

class SearchForm extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all(); // Bisa kamu ubah sesuai kebutuhan
    }

    public function render(): \Illuminate\View\View|\Closure|string
    {
        return view('components.search-form');
    }
}
