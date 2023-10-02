<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function addToCart(Request $request)
    {
        // Retrieve user_id, product_name, and product_price from the request
        $user_id = 2; // Default user_id for example
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');

        // Create a new cart item and save it to the database
        CartItem::create([
            'user_id' => $user_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
        ]);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    // public function showCart()
    // {
    //     // Retrieve and display the user's cart items
    //     $user_id = 2; // Default user_id for example
    //     $cartItems = CartItem::where('user_id', $user_id)->get();

    //     return view('products.cartshow', compact('cartItems'));
    // }
}
