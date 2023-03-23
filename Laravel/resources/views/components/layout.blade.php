<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{--  --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous" defer></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bsInit.js') }} " defer></script>
    {{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Brew Brothers - Craft Ale Brewery</title>
</head>


<body>
    <!-- Nav -->
    <x-nav> </x-nav>


    <!-- Nav End -->

    {{ $slot }}

    <x-footer></x-footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>


<script>
    $(document).ready(function() {
        $('body').on('click', '.addCartBtn', function(event) {
            event.preventDefault();
            var productId = $(this).data('product-id');
            console.log(productId)

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response)
                    // alert('Success, : ' + response.success);
                    // Will use the following line to update cart counter when implemented
                    // $('#cart-count').text(response.cart_count);
                },
                error: function(response) {
                    alert('Error: ' + response.responseJSON.error);
                },
            });
        });
    });
</script>

</html>
