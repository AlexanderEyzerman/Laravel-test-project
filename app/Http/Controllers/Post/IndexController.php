<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostRecourse;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request) //: View
    {
        $data = $request->validated();

        $page = $data["page"] ?? 1;
        $per_page = $data["per_page"] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate($per_page, ['*'], "page", $page);

        return PostRecourse::collection($posts);

        //return view('post.index', compact('posts'));

    }
}
