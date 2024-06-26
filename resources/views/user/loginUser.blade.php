
<!DOCTYPE html>
<html lang="en">
<head>
    @include('blocks.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      {{-- @include('admin.alert') --}}
        <div class="login-logo">
            <b>Login</b>
        </div>
      <form action="{{ route('loginUser.post') }}" method="post">
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="Email"
            value="{{old('email')}}">
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
            <input type="password" name="password" class="form-control " placeholder="Password">
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>   

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- Footer -->
@include('blocks.footer')
</body>
</html>
