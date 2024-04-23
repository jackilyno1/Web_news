@extends('user.layouts.main')
@section('content')
{{-- <div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div id="image_show">
                    <a href="{{ $post->img_url }}" target="_blank">
                        <img width="300px" src="{{ $post->img_url }}" alt="">
                    </a>
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text">{!! $post->content !!}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Comments</h5>
                    @foreach($post->comments as $comment)
                        <div class="card mb-2">
                            <div class="card-body">
                                <p class="card-text">{{ $comment->content }}</p>
                                <p class="card-text"><small class="text-muted">Posted by: {{ $comment->user->name ?? 'Anonymous' }}</small></p>
                            </div>
                        </div>
                    @endforeach
                    @auth
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('comments.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <label for="content">Add Comment:</label>
                                        <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <p class="text-muted">You need to <a href="{{ route('login') }}">login</a> to add a comment.</p>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Sidebar -->
        </div>
    </div>
</div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 mb-4">{{ $post->title }}</h1>
                <div id="image_show">
                    <a href="{{ $post->img_url }}" target="_blank">
                        <img width="300px" src="{{ $post->img_url }}" alt="">
                    </a>
                </div>
                <p class="lead">{{ $post->description }}</p>
                <hr>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Related Posts</h5>
                        <!-- You can display related posts here -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 mb-4">{{ $post->title }}</h1>
                <div id="image_show">
                    <a href="{{ $post->img_url }}" target="_blank">
                        <img width="300px" src="{{ $post->img_url }}" alt="">
                    </a>
                </div>
                <p class="lead">{{ $post->description }}</p>
                <hr>
                <div class="post-content">
                    {!! $post->content !!}
                </div>

                <hr>

                <h4>Comments</h4>
                {{-- @foreach($post as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                            <small class="text-muted">Posted by: {{ $comment->user->name ?? 'Anonymous' }}</small>
                        </div>
                    </div>
                @endforeach --}}

                {{-- @auth --}}
                    {{-- <form action="{{ route('comments.store', $post) }}" method="post" class="mb-3">
                        @csrf
                        <div class="form-group mb-3">
                            <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-2">Comments</button>
                        </div>
                    </form>
                {{-- @else --}}
                    {{-- <p class="text-muted">You need to <a href="{{ route('login') }}">login</a> to add a comment.</p> --}}
                {{-- @endauth --}}
            </div>
        </div>
    </div>
@endsection