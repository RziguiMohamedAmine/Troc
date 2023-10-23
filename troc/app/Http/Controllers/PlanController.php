<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function create()
{
    return view('backoffice.subscription.create'); 
}
    public function addBackofficePlans(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric', // Adjust the validation as needed
            'remise' => 'required|numeric', // Adjust the validation as needed
        ]);
    
        // Create a new plan
        $plan = Plan::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'), // Adjust the field name as needed
            'remise' => $request->input('remise'), // Adjust the field name as needed
        ]);
    
        return redirect()->route('backoffice.subscription.show')->with('message', 'Plan added successfully');
    }

    public function showBackofficePlans(){
        $plans=Plan::all();
        return view('backoffice.subscription.show', compact('plans'));
    }




    public function edit($id)
{
    $plan = Plan::findOrFail($id);
    return view('backoffice.subscription.edit', compact('plan'));
}

public function update(Request $request, $id)
{
    $plan = Plan::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric', // Ensure price is numeric
        'remise' => 'required|numeric', // Ensure price is numeric
    ]);

    $plan->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'remise' => $request->input('remise'),
    ]);

    return redirect()->route('backoffice.subscription.show')->with('message', 'Plan updated successfully');
}

public function destroy($id)
{
    $plan = Plan::findOrFail($id);
    $plan->delete();

    return redirect()->route('backoffice.subscription.show')->with('message', 'Plan deleted successfully');
}


public function buyPlan($planId){
    // Find the selected plan based on $planId (replace with your actual plan retrieval logic)
    $selectedPlan = Plan::find($planId);

    if (!$selectedPlan) {
        return redirect()->route('frontoffice.home')->with('error', 'Invalid plan selected.');
    }

    \Stripe\Stripe::setApiKey(config('stripe.sk'));
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => $selectedPlan->price * 100, // Convert to cents
                'product_data' => [
                    'name' => $selectedPlan->name, // Set the plan name as the product name
                    'description' => $selectedPlan->description, // Set the plan description
                ],
            ],
            'quantity' => 1, // Set the quantity to 1 for the selected plan
        ]],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('success'), // You may want to set a cancel route
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Update the user's plan to the selected plan
    $user->update(['plan' => $selectedPlan->id]);

    return redirect()->away($session->url);

}
public function success(Request $request)
    {        $plans = Plan::all();
        $products = Product::all();
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.home', compact('categories','products','plans'));
    }

   


    

}
