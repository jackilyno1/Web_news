@extends('admin.layouts.main')

@section('content')
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name Category</label>
          <input type="text" name="name" value="{{ $categories->name }}" class="form-control" id="name" placeholder="Enter name">
            {{-- @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror --}}
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      @csrf
    </form>
@endsection