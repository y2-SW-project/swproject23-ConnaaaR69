<x-layout>
    <div class="container-md">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid "
                    src="{{ $product->image ? asset('images/' . $product->image) : asset('no-image.png') }}"
                    alt="">
            </div>
            {{ ddd($product) }}
            <div class="col-md-6 d-flex flex-column">
                <h2>
                    {{ $product->title }}
                </h2>

                <h2>
                    €{{ $product->price }}
                </h2>
            </div>
        </div>
    </div>
</x-layout>
