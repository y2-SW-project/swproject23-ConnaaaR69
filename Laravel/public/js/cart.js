$(document).ready(function() {
    
    $('body').on('click', '.addCartBtn', event => {
        event.preventDefault();
        var productId = $(this).data('product-id');
      

        let addCartBtnHelper = document.getElementsByClassName('.addCartBtn');
        console.log(addCartBtnHelper);
        $('.addCartBtn').attr('data-bs-title', 'New Tooltip Title');
        
        
        
        $.ajax({
            url: "{{ route('cart.add') }}",
            method: 'POST',
            data: {
                product_id: productId,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log(response)
                let quantityUpdater = document.getElementsByClassName('.quant').innerHTML(response.cartProduct.quantity)
                // alert('Success, : ' + response.success);
                // Will use the following line to update cart counter when implemented
                // $('#cart-count').text(response.cart_count);
            },
            error: function(response) {
                alert('Error: ' + response.responseJSON.error);
            },
        });
    });

    $('body').on('click', '.cartDelete', function(event) {
        event.preventDefault();
        var productId = $(this).data('product-id');
        console.log(productId)

        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: 'POST',
            data: {
                product_id: productId,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log(response)
                // alert('Success, : ' + response.success);
                // Will use the following line to update cart counter when implemented
                $('#cart-count').text(response.cart_count);
               
            },
            error: function(response) {
                alert('Error: ' + response.responseJSON.error);
            },
        });
    });
});