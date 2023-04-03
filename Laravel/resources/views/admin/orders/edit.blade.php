<x-layout-no-footer>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-1 offset-md-2">
                <a href="{{ URL::previous() }}" class="btn btn-dark d-flex justify-content-center gap-2 px-5 my-3"><i
                        class="bi bi-arrow-left"></i>Back</a>
            </div>
        </div>
        <div class="row align-content-center">
            <div class="col-md-8 offset-md-2">
                <h1>Edit an Existing Order</h1>

                <form method="POST" action="{{ route('orders.update', $order) }}" enctype="multipart/form-data">
                    @csrf
                    @method('Put')

                    @if (Auth::user()->hasRole('admin'))
                        <select class="form-select" name='user_id'>
                            <option selected> Select a User to assign this order to </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} | id:
                                    {{ $user->id }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @foreach ($products as $product)
                    @endforeach
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>


</x-layout-no-footer>
