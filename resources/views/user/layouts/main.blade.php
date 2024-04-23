<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.blocks.head')
</head>
<body>
    @include('user.blocks.header')
    <main>
        @yield('content')
    </main>
    @include('user.blocks.footer')
</body>
</html>
