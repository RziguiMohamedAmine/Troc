@extends('frontoffice.index')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function showAlert() {
      Alert::success('This is a success alert!');
    }
  </script>
<section id="main" class="clearfix">
    <h1>My Cart</h1>
    <!-- Your cart content goes here -->
    <div class="cart-container">
        @if ($cartItems->isEmpty())
            <p>Aucun Article dans le Panier.</p>
        @else
            <table class="centered-table">
                <thead>
                    <tr>
                        <th>Produits</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>${{ $cartItem->product->price }}</td>
                            <td>
                            <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-remove">Supprimer du Panier</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Prix Total:</td>
                        <td>${{ $discountedTotalPrice }}</td>
                    </tr>
                </tfoot>
            </table>
        @endif
        <br>
        <div class="button-container">
        @if ($cartItems->isEmpty())
            <a href="/products" class="btn-confirm-purchase">Continuer Mes Achats</a>
        @else
        <form action="/checkout" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" id="confirmPurchaseButton">Confirmer Achats</button>
</form>
<button ><a href="/products" style="color: #000;"  >Continuer Mes Achats</a></button>
        @endif
        </div>
        <!-- <script>
document.getElementById('confirmPurchaseButton').addEventListener('click', function() {
    // Make a POST request to the confirm purchase endpoint
    fetch('/cart/confirm-purchase', {
        method: 'POST',
    })
    .then(function(response) {
        // Handle the response
        if (response.status === 200) {
            // The payment was successful
            // ...
        } else {
            // The payment failed
            // ...
        }
    });
});
</script> -->
    </div>
</section>

<!-- Include your CSS and JavaScript files here -->

<style>
    /* Add CSS styles for the "Confirm Purchase" button */
    .cart-container {
        margin: 0 auto;
        max-width: 600px;
    }

    .centered-table {
        width: 100%;
        border-collapse: collapse;
    }

    .centered-table th, .centered-table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .centered-table th {
        background-color: #f2f2f2;
    }

    .button-container {
        display: flex;
        justify-content: center;
    }

    .btn-confirm-purchase {
        background-color: #fff; /* White background */
        color: #007BFF; /* Initial text color */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s; /* Add a smooth transition */
    }

    .btn-confirm-purchase:hover {
        background-color: #007BFF; /* New background color on hover */
        color: #fff; /* New text color on hover */
    }
</style>
<!-- Additional content (e.g., ads) can be placed here -->
@endsection
