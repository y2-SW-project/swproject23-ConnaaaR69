<div>
    @php
        $user = Auth::user();
    @endphp
    <nav class="navbar navbar-expand-lg bg-dark bg-opacity-75">
        <div class="container-fluid d-flex justify-content-between">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-4 text-primary" href="{{ route('static.index') }}">
                <img src="/images/home/BBLogo.png" class="" alt="Bootstrap" width="30" />
                Brew Brothers</a>
            <div class="collapse navbar-collapse navbar-nav" id="navbarTogglerDemo03">
                <ul class="navbar-nav  my-2 m-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fs-5" href="{{ route('user.products.index') }}">Shop</a>
                    </li>
                    @auth
                        <li class="nav-item {{ $user->hasRole('admin') ? '' : 'd-none' }}">
                            <a class="nav-link fs-5" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                    @endauth
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse" role="button"
                                aria-expanded="false" aria-controls="collapse">
                                Cart
                            </a>
                            <div class="collapse" id="collapse">


                            </div>


                        </li>
                    @endauth


                </ul>
                <div class="login">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-item btn fs-5 border text-secondary" type="submit">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-item text-secondary fs-5 text-decoration-none">
                            Login/Register
                        </a>
                    @endauth


                </div>

            </div>



        </div>
    </nav>
</div>
