@extends('layouts.main')
@section('content')
    <div>
        <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">Create Post</a>
    </div>
    <div>
        @foreach($posts as $post)
            <div><a style="text-decoration:none" href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
    </div>
    <div>
        {{ $posts->withQueryString()->onEachSide(3)->links() }}
    </div>
@endsection
