<x-layout>
    <div class="container-md">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid my-5"
                    src="{{ $product->image ? asset('images/' . $product->image) : asset('no-image.png') }}"
                    alt="">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <h2 class="mt-5">
                    {{ ucfirst($product->title) }}
                </h2>

                <h3>
                    €{{ $product->price }}
                </h3>
                <p>{{ $product->text }}</p>

                {{-- <a class="addCartBtn btn btn-primary " data-product-id="{{ $product->id }}" data-bs-toggle="tooltip"
                    data-bs-title="Add to Cart" id='atcb'>
                    test
                </a> --}}

                <div class="col-md-3">
                    <a href="{{ URL::previous() }}" class="btn btn-dark d-flex justify-content-center gap-2 px-5 my-3"><i
                            class="bi bi-arrow-left"></i>Back</a>
                </div>

            </div>
        </div>
    </div>
</x-layout>
