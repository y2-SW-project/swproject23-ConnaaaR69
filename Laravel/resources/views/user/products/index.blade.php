<x-layout>

    <div class="bgStore d-flex flex-column justify-content-center min-vh-100 navpos">
        <div class="text-center text-light col-md-8 offset-md-2">
            <h1 class="display-1 text-primary fw-medium">
                Brew Brothers Craft Beer Store
            </h1>

            <p class="lead pb-3">
                Shop for your favourite craft beers here.
            </p>
            <a href="#store" class="btn btn-lg btn-primary">
                Shop Now
            </a>
        </div>
    </div>
    <div class="container-lg min-vh-100 " id="store">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 my-2">
                    <x-card :product="$product"></x-card>
                </div>
            @endforeach
        </div>
        {{-- {{ dd($products) }} --}}
        <div class="row">
            <div class="col-md-12 .d-flex justify-content-between">
                {{ $products->fragment('store')->links() }}
            </div>
        </div>



        {{-- @unless(count($products) == 0) --}}

        {{-- @else
            <p>No Products</p>
        @endunless --}}
    </div>
</x-layout>
