<header>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{url('template/user')}}/img/Logo1.png" width="130px">
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                <li class="dropdown-item">
                                    {{ $category->name }}
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    <form class="d-flex mt-3" style="height: 40px" role="search">
                        <input style="width: 350px;" class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </ul>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link">Hello, {{ Auth::user()->name }}</a>
                        </li>
                            <li class="nav-item">
                                <form action="{{ route('user.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Log out</button>
                                </form>
                            </li>
                    @else
                    <li class=" dropdown">
                        <a class="nav-link dropdown-toggle"data-bs-toggle="dropdown"aria-expanded="false">
                            <b>Account</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('user.login.post')}}">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <b>Sign In</b>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('register')}}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                    <b>Sign Up</b>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
        </div>
    </nav>
</header>
@yield('header')