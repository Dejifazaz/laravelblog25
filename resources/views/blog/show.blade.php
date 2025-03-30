@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Blog Post Header -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 fw-bold text-dark">{{ $post->title }}</h1>
                <p class="text-muted">
                    By <strong class="text-primary">{{ $post->user->name }}</strong> |
                    <small>{{ date('jS M Y', strtotime($post->updated_at)) }}</small>
                </p>
                <hr>
            </div>
        </div>

        <!-- Blog Post Content -->
        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}" class="img-fluid rounded-lg shadow-md">
                <p class="mt-4 lead text-dark">
                    {{ $post->description }}
                </p>
            </div>

            <!-- Sidebar for Related Posts -->
            <div class="col-md-4">
                <h3 class="fw-bold mb-3">Related Posts</h3>
                <ul class="list-group">
                    <!-- Example related posts, replace with dynamic content -->
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">
                            Another Blog Post 1
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">
                            Another Blog Post 2
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none text-dark">
                            Another Blog Post 3
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="fw-bold mb-3">Leave a Comment</h3>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-3">
                        <textarea name="content" class="form-control rounded-lg shadow-sm" rows="4" placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-lg shadow-sm">Post Comment</button>
                </form>
            </div>
        </div>

        <!-- Display Comments -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3 class="fw-bold mb-3">Comments</h3>
                @if ($post->comments && $post->comments->count() > 0)
                    @foreach ($post->comments as $comment)
                        <div class="card my-3 shadow-sm rounded-lg">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $comment->user->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->diffForHumans() }}</h6>
                                <p class="card-text">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">No comments yet. Be the first to comment!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
