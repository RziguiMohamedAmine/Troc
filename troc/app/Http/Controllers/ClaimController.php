<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function create($product_id)
    {
        $product = Product::find($product_id);
    
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
    
        return view('frontoffice.claims.create', compact('product'));
    }
    
   
    
    public function store(Request $request)
{
    $user = auth()->user();
    $request->validate([
        'claim_text' => 'required',
        'product_id' => 'required',
    ]);

    // Check if the user has already submitted a claim for this product
    $existingClaim = Claim::where('user_id',$user->id ) // Set the user ID to 2 (or any desired static value)
        ->where('product_id', $request->input('product_id'))
        ->first();

    // Create a new claim with the claim text, product ID, and static user ID (e.g., 2)
    $claim = new Claim([
        'claim_text' => $request->input('claim_text'),
        'product_id' => $request->input('product_id'),
        //user connected
        'user_id' => $user->id
    ]);

    // Save the claim
    if ($existingClaim) {
        session()->flash('error', 'You have already submitted a claim for this product!');
        return redirect()->route('products.show', $request->input('product_id'))->with('error', 'You have already submitted a claim for this product!');
    }else{
        $claim->save();
    }
    

    return redirect()->route('products.show', $request->input('product_id'))->with('success', 'Claim submitted successfully!');

}


    

}
