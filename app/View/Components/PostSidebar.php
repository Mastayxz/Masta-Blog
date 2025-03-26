<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostSidebar extends Component
{
    public $categories;
    public $ads;
    public $recommendedPosts;

    public function __construct($categories, $recommendedPosts, $ads)
    {
        $this->categories = $categories;
        $this->ads = $ads;
        $this->recommendedPosts = $recommendedPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.posts.post-sidebar');
    }
}
