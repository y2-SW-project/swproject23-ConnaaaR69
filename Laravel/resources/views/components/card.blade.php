@props(['product'])
<div class="card">
    {{-- {{ route('user.products.show', $product) }} --}}
    <a href="" class="text-decoration-none y">
        <img class="card-img-top img-fluid"
            src="{{ $product->image ? asset('images/' . $product->image) : asset('no-image.png') }}" alt="">
        <div class="card-body text-dark hover:text-primary">
            <h5 class=" card-title ">{{ $product->title }}</h5>

            <p class="card-title"></p>
            <p class="card-text">€{{ $product->price }}</p>
        </div>

    </a>
</div>
