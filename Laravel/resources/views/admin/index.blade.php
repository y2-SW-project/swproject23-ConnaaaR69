<x-layout-no-footer>
    <div class="container">
        {{-- Back button --}}
        <div class="row">
            <div class="col-md-1">
                <a href="{{ URL::previous() }}" class="btn btn-dark d-flex justify-content-center gap-2 px-5 my-3"><i
                        class="bi bi-arrow-left"></i>Back</a>
            </div>
        </div>
        {{-- Accordions --}}
        <div class="row">
            <div class="col-md-4  my-5">
                <div class="h2">Orders</div>

                <div class="accordion" id="accOrders">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="orders">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOrders">Orders</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="collapseOrders"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <a class="btn btn-secondary mt-2" href="{{ route('orders.create') }}"> Add New
                                    Order</a>
                                @foreach ($orders as $order)
                                    <x-order-card :order="$order"></x-order-card>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  my-5">
                <div class="h2">Products</div>

                <div class="accordion" id="accOrders">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="orders">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseProducts">Product</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="collapseProducts"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <a class="btn btn-secondary mt-2" href="{{ route('user.products.create') }}"> Add New
                                    Product</a>

                                @foreach ($products as $product)
                                    <x-product-card :product="$product"> </x-product-card>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @foreach ($users as $user)
                    <x-user-card :user="$user"></x-user-card>
                @endforeach
            </div>
        </div>
    </div>
</x-layout-no-footer>
