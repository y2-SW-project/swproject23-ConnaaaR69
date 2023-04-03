@php
    if (Auth::check()) {
        $user = Auth::user();
        $total = 0;
        $countObj = 0;
        $cart = $user->cart;
        $cartProducts = $cart->cartProducts;
    
        foreach ($cartProducts as $cartProduct) {
            $countObj += $cartProduct->quantity;
            $total += $cartProduct->product->price * $cartProduct->quantity;
        }
    }
    
@endphp
<div>



    <nav class="navbar navbar-expand-lg bg-dark bg-opacity-75">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-4 text-primary" href="{{ route('static.index') }}">
                <img src="/images/home/BBLogo.png" class="" alt="Bootstrap" width="30" />
                Brew Brothers</a>
            <div class="collapse navbar-collapse navbar-nav" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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

                </ul>
                <div class="d-flex gap-5">
                    @auth
                        <div class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-person-circle" style="font-size: 1rem;"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.orders') }}">Orders</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cart nav-item">
                            <a class="position-relative" data-bs-toggle="popover" data-bs-trigger="click" title="Cart"
                                data-bs-content="
                                <ul class='list-group'>
                                @foreach ($cartProducts as $product)
<li class='list-group-item d-flex justify-content-between gap-3'>   
                                        <p> {{ $product->product->title }}</p>
                                        <p> {{ '€' . $product->product->price }}</p>
                                        <p id='quant' class='quant'>Qty: {{ $product->quantity }}</p>
                                        </a>
                                        
                                </li>
@endforeach
                                <li class='list-group-item d-flex gap-2 align-items-center list-group-item active'>
                                    <span><strong>Total: </strong>€{{ $total }}</span>
                                    <a class='btn btn-sm btn-secondary' href='{{ route('cart.index') }}'>View Cart</a>
                                </li>
                                </ul>
                                ">


                                <i class="bi bi-basket2-fill text-light fs-2"></i>
                                <span class=" badge rounded-pill cartCounter text-dark">
                                    {{ $countObj }}
                                </span>
                            </a>

                        </div>
                    @endauth
                    <div class="login nav-item">
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
        </div>
    </nav>
</div>
