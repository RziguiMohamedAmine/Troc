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
        $selectedCategory = $request->query('category');
        $selectedSubcategory = $request->query('subcategory');

        
        $categories = Category::with('subcategories.products')->get();
        $subcategories = Subcategory::all();

        // Fetch products based on the selected category and subcategory
        if ($selectedSubcategory !== null) {
            $products = Product::where('subcategory_id', $selectedSubcategory)->get();
        } elseif ($selectedCategory !== null) {
            // Fetch products based on the selected category
            $products = Product::whereHas('subcategory', function ($query) use ($selectedCategory) {
                $query->where('category_id', $selectedCategory);
            })->get();
        } else {
            // No category or subcategory selected, show all products
            $products = Product::all();
        }

        return view('frontoffice.products.index', compact('categories', 'subcategories', 'products', 'selectedCategory', 'selectedSubcategory'));
    }


    public function showBackofficeProducts()
    {
        // Retrieve all products with their subcategories
        $products = Product::with('subcategory.category')->get();

        return view('backoffice.products.index', compact('products'));
    }

    public function userProducts()
    {
     // Get the currently authenticated user
      $user = Auth::user();

     // Fetch the products added by the user
     $products = $user->products;
     return view('frontoffice.products.user_products', compact('products'));
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
    public function show($product)
    {
       $index = Product::findOrFail($product);
    
         return view('frontoffice.products.show',['product' => $index]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product)
    {
        $product = Product::with('Subcategory')->findOrFail($product);
        $categories = Category::with('subcategories')->get();

        return view('frontoffice.products.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
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

        $product = Product::findOrFail($product);
        $product->name = $request->input('product-name');
        $product->description = $request->input('product-description');

        $exchangeType = $request->input('ad_exchange_type');

        if ($exchangeType === 'price') {
            $product->price = $request->input('product-price');
            $product->exchange_For = null;
        } elseif ($exchangeType === 'exchange') {
            $product->exchange_For = $request->input('product-exchange_for');
            $product->price = null;
        }

        $product->type = $request->input('product-type');
        $product->subcategory_id = $request->input('product-subcategory_id');
        $product->is_offering = $request->input('product-is_offering');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        $product->save();
    
        return redirect()->route('products.index',$product);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $delete=Product::findOrFail($product);
        $delete->delete();
        return redirect()->route('products.index');
    }
}
