<x-layout-no-footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Manually Create a New Order</h1>
                <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <select class="form-select" name='user_id'>
                        <option selected> Select a User to assign this order to </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} | id:
                                {{ $user->id }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary"> Submit</button>
                </form>
            </div>
        </div>
    </div>


</x-layout-no-footer>
