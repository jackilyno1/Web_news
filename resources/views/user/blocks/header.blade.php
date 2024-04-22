<header>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{url('template/user')}}/img/Logo1.png" width="130px">
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="#">{{ $category->name }}</a>
                                </li>
                                @endforeach
                        </ul>
                    </li>
                    <form class="d-flex" role="search">
                        <input style="width: 400px" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </ul>
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class=" dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"aria-expanded="false">
                            <b>Account</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <b>Sign In</b>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                    <b>Sign Up</b>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </nav>
</header>
@yield('header')