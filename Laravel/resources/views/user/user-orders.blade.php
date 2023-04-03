<x-layout>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 offset-md-2 pt-5">
                <h1>Your Orders</h1>

            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($orders as $order)
                        <x-order-card :order="$order"></x-order-card>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


</x-layout>
