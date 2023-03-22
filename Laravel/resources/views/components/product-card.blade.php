@props(['product'])
<div class="col-md-8 offset-md-2 my-2">
    <div class="card">
        <div class="card-body">
            <p>{{ $product->id }}</p>
            <p>{{ $product->title }}</p>
            <p>€{{ $product->price }}</p>
            <p>{{ $product->text }}</p>
            <p>{{ $product->uuid }}</p>

            <div class="d-flex gap-1">
                <form class="absolute left-50" action="{{ route('user.products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-dark text-light"
                        onclick="return confirm('Are you sure you want to delete this project?')"><i
                            class="bi bi-trash-fill"></i></button>
                </form>


                <a href="{{ route('user.products.edit', '$product') }}">
                    <button class="btn btn-primary text-dark"><i class="bi bi-pen-fill"></i></button>
                </a>

            </div>
        </div>
    </div>
</div>
