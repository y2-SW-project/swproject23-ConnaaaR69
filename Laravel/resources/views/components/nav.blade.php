@php
    if (Auth::check()) {
        $countObj = 0;
        $user = Auth::user();
        $cart = $user
            ->cart()
            ->with('cartProducts')
            ->first();
        $cartProducts = $cart->cartProducts;
        $total = 0;
        foreach ($cartProducts as $cartProduct) {
            $countObj++;
            $total += $cartProduct->product->price;
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
                        <div class="cart nav-item">
                            <a class="position-relative" data-bs-toggle="popover" data-bs-trigger="click" title="Cart"
                                data-bs-content="
                            <ul class='list-group'>
                              
                                @foreach ($cartProducts as $product)
<li class='list-group-item d-flex gap-3'>   

                                        <p> {{ $product->product->title }}</p>
                                        
                                        <p> {{ '€' . $product->product->price }}</p>
                                        <a class='removeCartBtn' href='' data-product-id='{{ $product->id }}' data-bs-toggle='tooltip'
                                            data-bs-title='Remove from Cart'><i class='bi bi-x-lg'></i>
                                        </a>
                                        
                                </li>
@endforeach
                                <li class='list-group-item list-group-item active'>
                                    <span><strong>Total: </strong>€{{ $total }}</span>
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
