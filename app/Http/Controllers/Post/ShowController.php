<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Post $post) : View
    {
        return view('post.show', compact('post'));
    }
}
