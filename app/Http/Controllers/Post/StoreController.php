<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostRecourse;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) //: RedirectResponse
    {
        $data = $request->validated();

        $post = $this->service->store($data);

        return new PostRecourse($post);

        //return redirect()->route('post.index');
    }
}
