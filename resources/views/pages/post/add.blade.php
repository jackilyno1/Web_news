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
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title"
              value="{{old('title')}}">
            {{-- @error('title')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
      </div>


      <div class="form-group mb-3">
            <label for="">Category</label>
            <select name="id_category" class="form-control" id="">
                <option value="0">Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{old('id_category')==$category->id?'selected':false}}>{{$category->name}}</option>
                    @endforeach
            </select>
            {{-- @error('id_category')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
        </div>


      <div class="form-group">
        <label for="description">Describe</label>
        <textarea name="description" class="form-control" placeholder="Short description">{{old('description')}}</textarea>
            {{-- @error('description')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
      </div>


      <div class="form-group" >
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" placeholder="Enter Content">{{old('content')}}</textarea>
            {{-- @error('content')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
      </div>


      <div class="form-group">
        <label>Image Upload</label>
        <input type="file" class="form-control-file" id="upload" name="file">
            {{-- @error('img_url')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
            <div id="image_show">

            </div>
            <input type="hidden" name="img_url" id="img_url">
      </div>

      
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
      <button type="submit" class="btn btn-primary col-3 py-2">Create</button>
    </div>
    @csrf
  </form>
@endsection
