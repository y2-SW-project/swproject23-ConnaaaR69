<x-layout>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h1>{{ $user->name }}</h1>

            </div>
            <div class="card-text">
                <h5>{{ $user->email }}</h5>
                <h5>Number of orders: {{ $orders }}</h5>
                {{-- <h2>{{ $user-> }}</h2> --}}
            </div>
        </div>
    </div>

</x-layout>
