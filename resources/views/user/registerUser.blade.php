<!DOCTYPE html>
<html lang="en">
<head>
    @include('blocks.head')
</head>
<body class="register-page" style="min-height: 568.802px;">
<div class="register-box">
    <div class="register-logo">
        <b>Admin</b>LTE
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="{{ route('register') }}" method="POST">
          <div class="form-group mb-3">
            <div class="input-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
            </div>
            @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <div class="input-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
            </div>
            @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <div class="input-group">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
            </div>
            @error('password')
                <span style="color: red">{{$message}}</span>
            @enderror
          </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
  @include('blocks.footer')
</body>
</html>