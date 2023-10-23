<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Plan;
use App\Http\Controllers\PlanController;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
    $categoriesWithPercentages = [];

    foreach ($categories as $category) {
        $subcategoryProductsCount = $category->subcategories->sum(function ($subcategory) {
            return $subcategory->products->count();
        });

        $totalProducts = Product::count();

        $percentage = ($subcategoryProductsCount / $totalProducts) * 100;

        $categoriesWithPercentages[] = [
            'category' => $category,
            'percentage' => $percentage,
        ];
    }

    return view('backoffice.categories.index', [
        'categories' => $categories,
        'categoriesWithPercentages' => $categoriesWithPercentages,
    ]);
        return view('backoffice.categories.index',['categories'=>Category::all()]);
    }



    public function indexFront()
    {
            $plans = Plan::all();
            $products = Product::all();
            $categories = Category::with('subcategories')->get();
            return view('frontoffice.home', compact('categories','products','plans'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie-name'=>'required',
            'categorie-description'=>'required',
        ]);
        $categorie =  new Category();
        $categorie->name = strip_tags($request->input('categorie-name'));
        $categorie->description = strip_tags($request->input('categorie-description'));
        $categorie->icon = strip_tags($request->input('categorie-icon'));

        $categorie->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categorie)
    {
        $categories = Category::all();

        return view('backoffice.categories.edit',[
            'categorie' => Category::findOrFail($categorie),
            'categories'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categorie)
    {

            $request->validate([
                'categorie-name'=>'required',
                'categorie-description'=>'required',
            ]);
            $updated = Category::findOrFail($categorie);
            $updated->name = strip_tags($request->input('categorie-name'));
            $updated->description = strip_tags($request->input('categorie-description'));

            $updated->save();
            return redirect()->route('categories.index',$categorie);


    }

    // public function updateName(Request $request, $id)
    // {
    //      $category = Category::find($id);
    //      $category = Category::where('id',$id)->first();
    //      $category->name = $request->value;
    //      $category->save();
    // }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categorie)
    {
        $delete=Category::findOrFail($categorie);
        $delete->delete();
        return redirect()->route('categories.index');
    }
/*
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

    {

        $plans = Plan::all();
        $products = Product::all();
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.home', compact('categories','products','plans'));
    }

*/




}
