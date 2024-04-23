@extends('layouts.main')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
      @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
      @endif
    <div class="card-body">
      <div class="form-group mb-3">
        <label for="title">Post title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" placeholder="Enter title">
            @error('title')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>


      <div class="form-group mb-3">
            <label for="">Category</label>
            <select name="id_category" class="form-control" id="">
                <option value="0">Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ $post->id_category == $category->id ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
            </select>
            @error('id_category')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>


      <div class="form-group">
        <label for="description">Describe</label>
        <textarea name="description" class="form-control" placeholder="Short description">{{$post->description}}</textarea>
            @error('description')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>


      <div class="form-group" >
        <label for="content">Content</label>
        <textarea name="content" style="height: 200px" id="content" class="form-control" placeholder="Enter Content">{{$post->content}}</textarea>
            @error('content')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>


      <div class="form-group">
        <label>Image Upload</label>
        <input type="file" class="form-control-file" id="upload" name="img_url">
            @error('img_url')
                <span style="color: red">{{$message}}</span>
            @enderror
            <div id="image_show">
              <a href="{{ $post->img_url }}" target="_blank">
                <img src="{{ $post->img_url }}" width="100px" alt="">
              </a>
            </div>
            <input type="hidden" value="{{ $post->img_url }}" name="img_url" id="img_url">
      </div>

      
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
      <button type="submit" class="btn btn-primary col-3 py-2">Update</button>
    </div>
    @csrf
  </form>
@endsection
