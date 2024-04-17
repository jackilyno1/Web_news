@extends('layouts.main')

@section('content')
<form action="" method="POST">
      @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
      @endif
    <div class="card-body">
      <div class="form-group mb-3">
        <label for="title">Username</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"
              value="{{old('name')}}">
        @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>

      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email"
              value="{{old('email')}}">
        @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password"
              value="{{old('password')}}">
        @error('password')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
      <button type="submit" class="btn btn-primary col-3 py-2">Create</button>
    </div>
    @csrf
  </form>
@endsection
