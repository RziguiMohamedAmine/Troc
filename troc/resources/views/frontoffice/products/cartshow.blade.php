@extends('frontoffice.index')

@section('content')
<section id="cart" class="clearfix">
    <h2>Shopping Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product_name }}</td>
                    <td>{{ $cartItem->product_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
