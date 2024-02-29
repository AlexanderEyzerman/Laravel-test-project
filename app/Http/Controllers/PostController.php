<?php

namespace App\Http\Controllers;


use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\Post\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
//  service
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request) : View
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(20);

        return view('post.index', compact('posts'));

    }
    public function create() : View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact( 'categories','tags'));
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post) : View
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) : View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(Post $post, UpdateRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) : RedirectResponse
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function delete()
    {
        $post = Post::find(6);
        $post->delete();

        dd('post deleted');
    }

    public function restore()
    {
        $post = Post::onlyTrashed()->find(6);
        $post->restore();

        dd('restored');
    }
    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'phpstorm post 1',
            'content' => 'content',
            'image' => 'image.jpg',
            'likes' => 200,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate([
            'title' => 'phpstorm post 1'
        ],
        $anotherPost);

        dump($post->content);

        dd('finished');
    }

    public function updateOrCreate()
    {
        $updatedPost = [
            'title' => 'phpstorm post upd1',
            'content' => 'some new content',
            'image' => 'imageupd.jpg',
            'likes' => 0,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate([
            'title' => 'phpstorm post upd1'
            ],
            $updatedPost);

        dump($post->content);

        dd('finished');
    }
}
