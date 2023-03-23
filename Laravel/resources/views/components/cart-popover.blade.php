<ul class="list-group">
    @foreach ($cartProducts as $cartProduct)
        <li class='list-group-item'>{{ $cartProduct->product->name }}</li>
    @endforeach
</ul>
