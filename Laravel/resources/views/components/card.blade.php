@props(['product'])
<div class="card position-relative">
    {{-- {{ route('user.products.show', $product) }} --}}
    @Auth
        <a class="addCartBtn rounded-circle .d-none .d-md-block" data-product-id="{{ $product->id }}" data-bs-toggle="tooltip"
            data-bs-title="Add to Cart"><i class="bi bi-plus-square "></i>
        </a>
    @endauth
    <a href="" class="text-decoration-none">
        <img class="card-img-top img-fluid "
            src="{{ $product->image ? asset('images/' . $product->image) : asset('no-image.png') }}" alt="">


        <div class="card-body text-dark hover:text-primary">
            <h5 class=" card-title ">{{ $product->title }}</h5>

            <p class="card-title"></p>
            <p class="card-text">€{{ $product->price }}</p>
        </div>

    </a>
</div>
