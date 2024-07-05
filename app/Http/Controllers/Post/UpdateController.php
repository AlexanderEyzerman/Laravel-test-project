<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)//: RedirectResponse
    {
        $data = $request->validated();

        $post = $this->service->update($post, $data);

        return new PostResourse($post);

        //return redirect()->route('post.show', $post->id);
    }
}
