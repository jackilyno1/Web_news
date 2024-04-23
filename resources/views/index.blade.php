@extends('user.layouts.main')
@section('content')
<div class="container">
    <h1 class="title py-3">Welcome to Our Blog</h1>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div id="image_show" class="d-flex justify-content-center">
                        <a href="{{ route('post.show', $post->id) }}">
                          <img src="{{ $post->img_url }}" width="200px" height="200px" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection