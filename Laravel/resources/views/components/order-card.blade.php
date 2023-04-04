@props(['order'])

<div class="col-md-8 offset-md-2 my-2">
    <div class="card relative">
        <div class="card-body">

            @if (request()->routeIs('admin.index'))
                <p class="fs-5 lh-0 fw-bold d-flex">
                    Order id:&nbsp;<span class="fw-normal"> {{ $order->id }}</span>
                    </span>
                </p>
            @endif


            <p class="fs-5 fw-bold">
                Order Recipient Name: <span class="fw-normal">{{ $order->user->name }}</span>

            </p>
            {{-- <p class="fs-5 fw-bold">
                Order id:
            </p>
            <p>{{ $order->user->address }}</p> --}}
            @if (request()->routeIs('admin.index'))
                <p class="fs-5 fw-bold">
                    Order Unique id: &nbsp;<span class="fw-normal">{{ $order->uuid }}</span>
                </p>
            @endif

            @php
                $time = strtotime($order->created_at);
                
                $dateF = date('d F Y, H:i', $time);
                
            @endphp

            <p class="fs-5 fw-bold">
                Ordered on: &nbsp;<span class="fw-normal">{{ $dateF }}</span>
            </p>

            <p class="fs-5 fw-bold">
                Order Products:
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>€ {{ $product->price }}</td>
                            <td class="text-center">{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex gap-1">
                @if (request()->routeIs('admin.index'))
                    <form class="absolute left-50" action="{{ route('orders.destroy', $order) }}" method="POST">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-dark text-light"
                            onclick="return confirm('Are you sure you want to delete this order?')"><i
                                class="bi bi-trash-fill"></i></button>
                    </form>


                    <a href="{{ route('orders.edit', $order) }}">
                        <button class="btn btn-primary text-dark"><i class="bi bi-pen-fill"></i></button>
                    </a>
                @endif
                @if (request()->routeIs('user.orders'))
                    <form class="absolute left-50" action="{{ route('orders.destroy', $order) }}" method="POST">
                        @csrf
                        @method('Delete')



                        @if ($order->created_at->diffInHours(now()) < 1)
                            <button class="btn btn-danger text-light"
                                onclick="return confirm('Are you sure you want to cancel this order?')"><i
                                    class="bi bi-x-circle"></i> Cancel Order</button>
                        @endif

                    </form>
                @endif
            </div>


        </div>
    </div>
</div>
