@extends('user.layouts.main')
@section('content')
    <div class="container py-4">
        <div class="row">
            <h1 class="display-4 mb-4">{{ $post->title }}</h1>
            <div class="col-4">
                <div id="image_show">
                    <a href="{{ $post->img_url }}" target="_blank">
                        <img width="300px" src="{{ $post->img_url }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-7">
                <p class="lead">{{ $post->description }}</p>
                <hr>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
            </div>
                @if (Auth::check())
                <hr class="mt-3">
                <h4>Comment:</h4>
                    <form action="/post/{{ $post->id }}/comments" method="POST">
                    @csrf
                    <textarea style="height: 250px" name="content" id="content" class="form-control mt-3">{{old('content')}}</textarea>
                    <div class="d-flex mt-3 justify-content-end">
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                    </form>
                @endif
                    <hr class="mt-3">
                    <h2>Comments:</h2>
                @foreach ($post->comments as $comment)
                    <hr class="mt-2">
                    <div>
                        <strong>{{ $comment->user->name }}</strong>
                        <span>at {{ $comment->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div>
                        {{ $comment->content }}
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection