@props(['order'])
<div class="col-md-8 offset-md-2 my-2">
    <div class="card relative">
        <div class="card-body">
            <p>{{ $order->id }}</p>
            <p>{{ $order->user->name }}</p>
            <p>{{ $order->user->address }}</p>
            <p>{{ $order->uuid }}</p>
            @foreach ($order->products as $product)
                <p>
                    {{ $product->title . ' ' . '€' . $product->price }}
                </p>
            @endforeach
            <div class="d-flex gap-1">
                <form class="absolute left-50" action="{{ route('orders.destroy', $order) }}" method="POST">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-dark text-light"
                        onclick="return confirm('Are you sure you want to delete this project?')"><i
                            class="bi bi-trash-fill"></i></button>
                </form>
                <a href="{{ route('orders.edit', $order) }}">
                    <button class="btn btn-primary text-dark"><i class="bi bi-pen-fill"></i></button>
                </a>

            </div>


        </div>
    </div>
</div>
