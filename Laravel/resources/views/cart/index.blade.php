<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="{{ URL::previous() }}" class="btn btn-dark d-flex justify-content-center gap-2 px-5 my-3"><i
                        class="bi bi-arrow-left"></i>Back</a>
            </div>
            <div class="col-md-8 offset-md-2 d-flex justify-items-center">


                <h1>Your Cart <span class="fs-3">({{ count($cart) }} Items)</span></h1>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 d-flex justify-items-center">

                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $product)
                                <tr>
                                    <td>{{ $product->product->title }}</td>
                                    <td>{{ $product->product->text }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td>€{{ $product->product->price }}</td>
                                    <td><button href="{{ route('user.products.index') }}" class="btn-close"></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
