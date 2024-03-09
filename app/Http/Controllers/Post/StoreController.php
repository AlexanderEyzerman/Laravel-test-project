<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}
