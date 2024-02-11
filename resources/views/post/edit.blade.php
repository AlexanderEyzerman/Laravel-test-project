@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title">Title</label>
                <input name ="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select class="form-control" id="categories" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category->id === $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select class="form-control" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option @foreach ($post->tags as $postTag) {{$postTag->id === $tag->id ? 'selected' : '' }} @endforeach value="{{ $tag->id }}">{{ $tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <div>
                <a class="btn btn-primary" href="{{ route('post.show', $post->id ) }}">Back</a>
            </div>
        </form>
    </div>
@endsection
