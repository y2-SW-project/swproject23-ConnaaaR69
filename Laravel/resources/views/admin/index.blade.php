<x-layout-no-footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 my-5">
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
                                    <div class="col-md-8 offset-md-2 my-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>{{ $order->id }}</p>
                                                <p>{{ $order->user->name }}</p>
                                                <p>{{ $order->user->address }}</p>
                                                <p>{{ $order->uuid }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">

            <div class="col-md-8 offset-md-2 my-5">
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
                                    <div class="col-md-8 offset-md-2 my-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>{{ $product->id }}</p>
                                                <p>{{ $product->title }}</p>
                                                <p>€{{ $product->price }}</p>
                                                <p>{{ $product->text }}</p>
                                                <p>{{ $product->uuid }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout-no-footer>
