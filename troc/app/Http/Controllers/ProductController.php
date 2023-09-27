<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Get the category and subcategory IDs from the query parameters
    $categoryID = $request->query('category');
    $subcategoryID = $request->query('subcategory');

    // Fetch all categories
    $categories = Category::all();

    // Fetch all subcategories, and products based on the selected category and subcategory
    $subcategories = Subcategory::all();
    
    // Create a base query for products
    $productsQuery = Product::query();

    // Filter products based on the selected subcategory, if provided
    if ($subcategoryID) {
        $productsQuery->where('subcategory_id', $subcategoryID);
    }

    // Filter products based on the selected category, if provided
    if ($categoryID) {
        $productsQuery->whereIn('subcategory_id', function ($query) use ($categoryID) {
            $query->select('id')
                ->from('subcategories')
                ->where('category_id', $categoryID);
        });
    }

    // Execute the query and get the products
    $products = $productsQuery->get();

    return view('frontoffice.products.index', compact('categories', 'subcategories', 'products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product-name' => 'required|string|max:255',
            'product-description' => 'required|string',
            'product-type' => 'required|in:product,service',
            'product-subcategory_id' => 'required|exists:subcategories,id',
            'product-is_offering' => 'required|boolean',
            'ad_exchange_type' => 'required|in:price,exchange',
            'product-price' => Rule::requiredIf(function () use ($request) {
                return $request->input('ad_exchange_type') === 'price';
            }) . '|nullable|numeric|min:0',
            'product-exchange_for' => Rule::requiredIf(function () use ($request) {
                return $request->input('ad_exchange_type') === 'exchange';
            }) . '|nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Create a new product
        $product = new Product();
        $product->name = $request->input('product-name');
        $product->description = $request->input('product-description');

        $exchangeType = $request->input('ad_exchange_type');

        if ($exchangeType === 'price') {
            $product->price = $request->input('product-price');
            // Handle the price data
        } elseif ($exchangeType === 'exchange') {
            $product->exchange_For = $request->input('product-exchange_for');
            // Handle the exchange data
        }


        $product->type = $request->input('product-type');
        $product->subcategory_id = $request->input('product-subcategory_id');
        $product->is_offering = $request->input('product-is_offering');
        $product->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
