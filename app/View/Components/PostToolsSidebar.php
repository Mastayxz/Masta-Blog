<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostToolsSidebar extends Component
{
    public $post;
    public $categories;
    public $recommendedPosts;

    public function __construct($post, $categories, $recommendedPosts)
    {
        $this->post = $post;
        $this->categories = $categories;
        $this->recommendedPosts = $recommendedPosts;
    }

    public function render()
    {
        return view('components.post-tools-sidebar');
    }
}
