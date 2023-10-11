<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        auth()->user()->cart()->create([
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('message', 'Item added to cart successfully');
    }

    public function showCart()
    {
        $cartItems = auth()->user()->cart;
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product->price;
        }

        return view('frontoffice.cart.show', compact('cartItems', 'totalPrice'), [
            'confirmPurchaseButton' => true,
        ]);
    }

    

    public function index(){
        return view('frontoffice.cart.show');

    }


    public function checkout() {
        $cartItems = auth()->user()->cart;
        $lineItems = [];
    
        foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;
    
            if ($product) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $product->price * 100, // Convert to cents
                        'product_data' => [
                            'name' => $product->name, // Set the product name
                            'description' => $product->description, // Set the product description
                        ],
                    ],
                    'quantity' => 1, // Set the quantity to 1 for each product
                ];
            }
        }
    
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('success'),
        ]);
    
        return redirect()->away($session->url);
    }
    



    public function success(){

        auth()->user()->cart()->delete();
        $cartItems = auth()->user()->cart;

        return view('frontoffice.cart.show', compact('cartItems'));


    }
    public function removeItem($id) {
        // Find the cart item by its ID
        $cartItem = Cart::find($id);
    
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Item not found in the cart.');
        }
    
        // Ensure that the cart item belongs to the currently authenticated user
        if ($cartItem->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    
        // Remove the cart item
        $cartItem->delete();
    
        return redirect()->back()->with('message', 'Item removed from the cart.');
    }
}
