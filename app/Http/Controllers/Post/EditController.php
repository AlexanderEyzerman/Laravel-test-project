<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}
