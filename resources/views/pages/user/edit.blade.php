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
        <label for="name">Username</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"
        value="{{$user->name}}">
        @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>

      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email"
        value="{{$user->email}}">
      </div>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password"
        value="{{$user->password}}">
        @error('password')
                <span style="color: red">{{$message}}</span>
            @enderror
      </div>
      <div class="form-group mb-3">
        <label>Role:</label><br>
        <input type="radio" name="role" value="user" @if($user->role == 'user') checked @endif> User
        <input class="ml-2" type="radio" name="role" value="admin" @if($user->role == 'admin') checked @endif> Admin
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
      <button type="submit" class="btn btn-primary col-3 py-2">Update</button>
    </div>
    @csrf
  </form>
@endsection
