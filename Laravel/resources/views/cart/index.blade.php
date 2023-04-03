<x-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-1">
                <a href="{{ URL::previous() }}" class="btn btn-dark d-flex justify-content-center gap-2 px-5 my-3"><i
                        class="bi bi-arrow-left"></i>Back</a>
            </div>
            <div class="col-md-8 offset-md-2 d-flex justify-items-center">


                <h1>Your Cart <span class="fs-3">({{ count($cart) }} Products)</span></h1>
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
                                    <td class="text-center quant">{{ $product->quantity }}</td>
                                    <td>€{{ $product->product->price }}</td>
                                    <td>
                                        <a data-product-id="{{ $product->id }}" class="cartDelete"><i
                                                class="bi bi-x-lg text-dark"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
            <div class="row justify-content-end">
                <div class="col-md-3 py-5">
                    <form class="absolute left-50" action="{{ route('order.finalise') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary"> Proceed To Checkout<i class="bi bi-arrow-right "></i></button>

                    </form>
                </div>
            </div>


        </div>
    </div>
</x-layout>
